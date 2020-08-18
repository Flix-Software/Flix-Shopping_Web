<?php

if (!defined('_JEXEC')) die('Direct Access to ' . basename(__FILE__) . ' is not allowed.');

/**
* @package OS CCK
* @copyright 2019 OrdaSoft.
* @author Andrey Kvasnevskiy(akbet@mail.ru),Roman Akoev (akoevroman@gmail.com)
* @link http://ordasoft.com/cck-content-construction-kit-for-joomla.html
* @description OrdaSoft Content Construction Kit
* @license GNU General Public license version 2 or later; 
*/

class booking_calendar{
    
//    var $tab1 = null;
//    var $tab2 = null;
//    var $tab3 = null;
//    var $tab4 = null;
    
    static function getCalendar($month, $year, $id, $show_details){
          $month = (int) $month;
          $year = (int) $year;

          if ($month == 1)
          {
              $month1 = 12;
              $year1 = $year - 1;
          } else
          {
              $month1 = $month - 1;
              $year1 = $year;
          }

          if ($month == 12)
          {
              $month2 = 1;
              $month3 = 2;
              $year2 = $year3 = $year + 1;
          } else
          {
              $month2 = $month + 1;
              $month3 = $month + 2;
              $year2 =$year3 = $year;
          }
          if($month3 > 12){
            $month3 = $month3 - 12;
            $year3 = $year + 1;
          }
          
      $calendar = new stdClass();
      $calendar->tab1 = booking_calendar::getMonthCal($month1, $year1, $id, $show_details);
      $calendar->tab2 = booking_calendar::getMonthCal($month, $year, $id, $show_details);
      $calendar->tab3 = booking_calendar::getMonthCal($month2, $year2, $id, $show_details);
      $calendar->tab4 = booking_calendar::getMonthCal($month3, $year3, $id, $show_details);
//      $calendar->tab21 = booking_calendar::getCalendarPrice($month1, $year1, $id);
//      $calendar->tab22 = booking_calendar::getCalendarPrice($month, $year, $id);
//      $calendar->tab23 = booking_calendar::getCalendarPrice($month2, $year2, $id);
//      $calendar->tab24 = booking_calendar::getCalendarPrice($month3, $year3, $id);

      return $calendar;
    }
    
    static function getMonthCal($month, $year, $id, $show_details) {
      global $db, $os_cck_configuration;
      if($show_details){
          $booking_calendar = new booking_calendar;
      }
      $query = "SELECT rent_from, rent_until, rent_return
              FROM #__os_cck_rent WHERE fk_eiid='".$id."'
              AND rent_return is null ORDER BY rent_from";
        $db->setQuery($query);
        $calenDate = $db->loadObjectList();
      $skip = date("w", mktime(0, 0, 0, $month, 1, $year)) - 1;
      if ($skip < 0){
        $skip = 6;
      }
      $daysInMonth = date("t", mktime(0, 0, 0, $month, 1, $year));      
    /*******************************get only rent days*****************************/ 
      if($os_cck_configuration->get('rent_type') != 2){
          $rentDataArr = array();
          $i=0;
          foreach ($calenDate as &$value) {
            if(!($value->rent_return)){
              if(isset($calenDate[($i+1)]) && $calenDate[($i+1)]->rent_from == $calenDate[$i]->rent_until){
                $calenDate[($i+1)]->rent_from = $calenDate[$i]->rent_from;
                unset($calenDate[$i]);
                $i++;
                continue;
              }   
             array_push($rentDataArr, $value);
            }$i++;
          }
      
        $calenDate = $rentDataArr;
      }
      //var_dump($calenDate);
      $calendar = '';
      $day = 1;
      $smonth = booking_calendar::getMonth($month);
      $calendar = '<table class="cck_tableC" style="border-collapse: separate;'.
        ' border-spacing: 2px;text-align:center"><tr class="year"><th colspan = "7">' .
        $smonth . ' ' . $year . '</th></tr><tr class="days"><th>' . JText::_('MON') .
        '</th><th>' . JText::_('TUE') . '</th><th>' . JText::_('WED') . '</th><th>' .
        JText::_('THU') . '</th><th>' . JText::_('FRI') . '</th><th>' . JText::_('SAT') .
         '</th><th>' . JText::_('SUN') . '</th></tr>';
      for ($k = 0; $k < 6; $k++) {
        $calendar .= '<tr>';
        for ($j = 0; $j < 7; $j++) {
          if (($skip > 0) or ($day > $daysInMonth)){
            $calendar .= '<td> &nbsp; </td>';
            $skip--;
          }else{ 
            $isAvilable = self::getAvilableCCK($calenDate,$month,$year,$day,$id);
            
            if($show_details){
                $day_html = $booking_calendar->getDropdownMenu($calenDate,$month,$year,$day);
            }else{
                $day_html = $day;
            }
            //var_dump($day_html);
            $calendar .= '<td class="'.$isAvilable.'">' . $day_html . '</td>';
            //  $calendar .= '<td>' . $day . '</td>';
            $day++;
          }
        }
        $calendar .= '</tr>';
      }
      $calendar .= '</table>';

      return $calendar;
    }

//    static function getCalendarPrice($month, $year, $id){
//      global $database;
//      $query = "SELECT * FROM `#__rem_rent_sal` " .
//        " WHERE (`fk_houseid`='$id') and (`yearW`='$year') and (`monthW`='$month')";
//      $database->setQuery($query);
//      $calenWeeks = $database->loadObjectList();
//      if (!empty($calenWeeks)){
//        $calenWeek = $calenWeeks[0];
//        $calendar = "";
//        $calendar = '<table style="text-align:left">';
//        $calendar .= '<tr><td><b>' . _REALESTATE_MANAGER_LABEL_CALENDAR_WEEK . '<b></td></tr>';
//        $calendar .= '<tr><td>' . str_replace("\n", "<br>\n", $calenWeek->week) . '</td></tr>';
//        $calendar .= '<tr><td><b>' . _REALESTATE_MANAGER_LABEL_CALENDAR_WEEKEND . '<b></td></tr>';
//        $calendar .= '<tr><td>' . str_replace("\n", "<br>\n", $calenWeek->weekend) . '</td></tr>';
//        $calendar .= '<tr><td><b>' . _REALESTATE_MANAGER_LABEL_CALENDAR_MIDWEEK . '</b></td></tr>';
//        $calendar .= '<tr><td><span>' . str_replace("\n", "<br>\n", $calenWeek->midweek) . '<span></td></tr>';
//        $calendar .= '</table>';
//        return $calendar;
//      }
//    }
    
    static function getMonth($month) {

        switch ($month) {
            case 1:
                $smonth = JText::_('JANUARY');
                break;
            case 2:
                $smonth = JText::_('FEBRUARY');
                break;
            case 3:
                $smonth = JText::_('MARCH');
                break;
            case 4:
                $smonth = JText::_('APRIL');
                break;
            case 5:
                $smonth = JText::_('MAY');
                break;
            case 6:
                $smonth = JText::_('JUNE');
                break;
            case 7:
                $smonth = JText::_('JULY');
                break;
            case 8:
                $smonth = JText::_('AUGUST');
                break;
            case 9:
                $smonth = JText::_('SEPTEMBER');
                break;
            case 10:
                $smonth = JText::_('OCTOBER');
                break;
            case 11:
                $smonth = JText::_('NOVEMBER');
                break;
            case 12:
                $smonth = JText::_('DECEMBER');
                break;
        }

        return $smonth;
    }
    
    static function getAvilableCCK ($calenDate,$month,$year,$day,$id){
        global $flag3, $os_cck_configuration;
        //var_dump($flag3);
        if(strlen($month) == 1){
            $month = '0'.$month ;
          }
          if(strlen($day) == 1){
            $day = '0'.$day ;                     
          }
          $toDay = $day+1;
          if(strlen($toDay) == 1){
            $toDay = '0'.$toDay ;
          }
        $cheackDataFrom = $year.'-'.$month.'-'.$day;
        $cheackDataTo = $year.'-'.$month.'-'.$toDay;

        foreach ($calenDate as $oneTerm){
          $from=explode(' ',$oneTerm->rent_from);
          $until=explode(' ',$oneTerm->rent_until);
//          var_dump($cheackDataFrom >= $oneTerm->rent_until);
//          var_dump($cheackDataFrom);
//          var_dump($oneTerm->rent_until);
          //if($cheackDataFrom >= $oneTerm->rent_until)continue;
          if($cheackDataFrom > $oneTerm->rent_until)continue;
          
          if($cheackDataTo <= date('Y-m-d')){
            if($os_cck_configuration->get('rent_type') == '1'
                && ($cheackDataFrom == $until[0] || $cheackDataFrom == $from[0] )){
                
              if($flag3){
                $flag3 = false;
                return 'calendar_day_gone_not_avaible_night_end';
              }else{
                $flag3 = true;
                return 'calendar_day_gone_not_avaible_night_start';
              }
            }
            if($cheackDataTo > date('Y-m-d')){
                return 'calendar_day_gone_not_avaible';
            }
          } 
          
//          var_dump($cheackDataFrom);
//          var_dump($until);
//          var_dump($from);
            if($os_cck_configuration->get('rent_type') == 0 
              && ($cheackDataFrom == $until[0] || $cheackDataFrom == $from[0] )){
              if($flag3){

                $flag3 = false;
                return 'calendar_not_available_night_end';
              }else{

                $flag3 = true;
                return 'calendar_not_available_night_start';
              }  
              
            }
            
            if($os_cck_configuration->get('rent_type') == 2 ){
                $date_NA = available_dates_cck($id, 15);
                if(in_array($cheackDataFrom, $date_NA)){
                    return 'calendar_not_available';
                }
                if($cheackDataFrom == $until[0] || $cheackDataFrom == $from[0] ){
                    return 'calendar_partially_available_time';
                }
              
            }
            
            if($cheackDataFrom >= $from[0] && $cheackDataFrom <= $until[0]){
                return 'calendar_not_available';
            }
          
          if($cheackDataTo <= date('Y-m-d')){
            return 'calendar_day_gone_avaible';
          }
        }
        if(isset($cheackDataTo) && $cheackDataTo <= date('Y-m-d')){
          return 'calendar_day_gone_avaible';
        }
        return 'calendar_available';
      }
      
      public function getMonthYearSelect($initial, $final){
          $jinput = JFactory::getApplication()->input;
          $month_select = $jinput->get('month_selected', date('n'), 'INT');
          $year_select = $jinput->get('year_selected', date('Y'), 'INT');
          $month_option = array();
          $month_option[]  = JHTML::_('select.option','1','January');
          $month_option[]  = JHTML::_('select.option','2','February');
          $month_option[]  = JHTML::_('select.option','3','March');
          $month_option[]  = JHTML::_('select.option','4','April');
          $month_option[]  = JHTML::_('select.option','5','May');
          $month_option[]  = JHTML::_('select.option','6','June');
          $month_option[]  = JHTML::_('select.option','7','July');
          $month_option[]  = JHTML::_('select.option','8','August');
          $month_option[]  = JHTML::_('select.option','9','September');
          $month_option[]  = JHTML::_('select.option','10','October');
          $month_option[]  = JHTML::_('select.option','11','November');
          $month_option[]  = JHTML::_('select.option','12','December');
          
          $month_html = JHTML::_('select.genericlist', $month_option, 'month_selected', 'onchange="form.submit()"','value', 'text',$month_select);
          
          $year_option = array();
          for ($i = $initial; $i <= $final; $i++){
              $year_option[] = JHTML::_('select.option',$i,$i);
          }
          $year_html = JHTML::_('select.genericlist', $year_option, 'year_selected', 'onchange="form.submit()"','value', 'text',$year_select);
          
          $html = '<form action="" method="post" id="calendar" class="booking_calendar_month_year" name="calendar">' . $month_html . $year_html . '</form>';
          
          return $html;
    
      }
      
      public function getNavButtons(){
          $jinput = JFactory::getApplication()->input;
          $month_select = $jinput->get('month_selected', date('n'), 'INT');
          $year_select = $jinput->get('year_selected', date('Y'), 'INT');
          
          $month_previous = ($month_select == 1) ? 12 : $month_select-1;
          $year_previous = ($month_select == 1) ? $year_select-1 : $year_select;
          
          $month_next = ($month_select == 12) ? 1 : $month_select+1;
          $year_next = ($month_select == 12) ? $year_select+1 : $year_select;
          
          $html = '<div class="booking_calendar_nav_buttons"><div class="booking_calendar_previous" style="text-align: left;">
                  <form action="" method="post" name="calendar">
                    <input type="hidden" name="month_selected" value="' . $month_previous . '">
                    <input type="hidden" name="year_selected" value="'. $year_previous . '">
                    <input type="submit" value="Previous">
                  </form>
                </div>';
          
          $html .= '<div class="booking_calendar_next" style="text-align: right;">
                  <form action="" method="post" name="calendar">
                    <input type="hidden" name="month_selected" value="'.$month_next.'">
                    <input type="hidden" name="year_selected" value="'.$year_next.'">
                    <input type="submit" value="Next">
                  </form>
                </div></div>';
          
          return $html;
      }
      
      private function getDropdownMenu($calenDate,$month,$year,$day){
          
          $html = '';
          if(strlen($month) == 1){
            $month = '0'.$month ;
          }
          if(strlen($day) == 1){
            $day = '0'.$day ;                     
          }
          $toDay = $day+1;
          if(strlen($toDay) == 1){
            $toDay = '0'.$toDay ;
          }
          $cheackDataFrom = $year.'-'.$month.'-'.$day;
          $cheackDataTo = $year.'-'.$month.'-'.$toDay;
          
          $li_html = array();
          foreach ($calenDate as $oneTerm){
            $from=explode(' ',$oneTerm->rent_from);
            $until=explode(' ',$oneTerm->rent_until);

            if($cheackDataFrom == $until[0] || $cheackDataFrom == $from[0]){
                //COM_OS_CCK_LABEL_BOOKING_CALENDAR_IS_BUSY
                $li_html[] = '<li>' . $oneTerm->rent_from . ' - ' . $oneTerm->rent_until . ' ' . JText::_('COM_OS_CCK_LABEL_BOOKING_CALENDAR_IS_BUSY') . '</li>';
            }
            elseif ($cheackDataFrom > $from[0] && $cheackDataFrom < $until[0]) {
                $li_html[] = '<li>' . $oneTerm->rent_from . ' - ' . $oneTerm->rent_until . ' ' . JText::_('COM_OS_CCK_LABEL_BOOKING_CALENDAR_IS_BUSY') . '</li>';
            }
          }
          //var_dump($li_html);
          if(count($li_html) > 0){
              $html .= '<div class="dropdown_os-toggle dropdown-toggle" align="center" data-toggle="dropdown_os">' . $day . '</div>';
              $html .= '<ul class="dropdown_os-menu dropdown-menu" >';
              foreach ($li_html as $li){
                  $html .= $li;
              }
              $html .= '</ul>';
          }else{
              $html .= $day;
          }
          
          return $html;
      }
}