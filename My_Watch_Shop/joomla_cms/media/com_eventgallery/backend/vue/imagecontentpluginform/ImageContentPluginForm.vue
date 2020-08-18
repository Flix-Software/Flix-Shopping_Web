<template>
    <div>
        <form>
            <div class="adminform form-horizontal">
                <template v-for="field in formDefinition.form.fieldset.field">
                    <Input v-if="field.type==='text'" v-model="data[field.name]" :name="field.name" :label="field.label" :description="field.description"></Input>
                    <Select v-else-if="field.type==='list'" v-model="data[field.name]" :name="field.name" :label="field.label" :description="field.description" :options="field.option" :default-value="field.default"></Select>
                    <Radio v-else-if="field.type==='radio'" v-model="data[field.name]" :name="field.name" :label="field.label" :description="field.description" :options="field.option" :default-value="field.default"></Radio>
                    <ImageSelector v-else-if="field.type==='imageselector'" v-model="data.image" :load-folders-url="loadFoldersUrl" :load-files-url="loadFilesUrl" :name="field.name" :label="field.label" :description="field.description"></ImageSelector>
                    <div v-else>Unsupported form element {{field}}</div>
                </template>
            </div>

            <pre id="imagetagfield">{{tagContent}}</pre>

            <button class="btn btn-primary" v-on:click="insertImageContentTag">{{i18n.t('COM_EVENTGALLERY_CONTENTPLUGINBUTTON_BUTTON_INSERT')}}</button>

        </form>

    </div>
</template>

<script>

    import ImageSelector from "./ImageSelector.vue";
    import Input from "./Input.vue";
    import Select from "./Select.vue";
    import Radio from "./Radio.vue";

    export default {
        components: {
            ImageSelector, Input, Select, Radio
        },
        props: {
            editorName: null,
            loadFoldersUrl: null,
            loadFilesUrl: null,
            formId: null,
            formDefinitionJson: null,
            i18n: null
        },
        data() {
            return {
                data: {
                    attr: null,
                    image_crop: null,
                    image_mode: null,
                    image_width: null,
                    cssclass: null,
                    use_cart: null,
                    image: {
                        file: null,
                        folder: null,
                        thumb: null
                    },
                },
                formDefinition: JSON.parse(this.formDefinitionJson),
            };
        },
        computed: {
            tagContent: function() {
                let tag = "{eventgallery-image ";

                tag = tag + "event='" + this.data.image.folder + "' ";
                tag = tag + "file='" + this.data.image.file + "' ";

                tag = tag + "attr='"+ this.data.attr +"' ";

                if (this.data.attr === "image") {
                    tag = tag + "mode='"+ this.data.image_mode +"' ";
                    tag = tag + "crop='"+ this.data.image_crop +"' ";
                    if (this.data.image_width) tag = tag + "thumb_width='"+ this.data.image_width + "' ";
                    if (this.data.cssclass) tag = tag + "cssclass='"+ this.data.cssclass + "' ";
                }

                tag = tag + "}";

                return tag
            }
        },
        methods: {
            insertImageContentTag: function() {
                console.log(this.tagContent);
                // Joomla 3.x code
                if (window.parent.jInsertEditorText) {
                    window.parent.jInsertEditorText(this.tagContent, this.editorName);
                    window.parent.SqueezeBox.close();
                } else {
                    // Joomla 4 code
                    window.parent.Joomla.editors.instances[this.editorName].replaceSelection(this.tagContent);
                    window.parent.Joomla.Modal.getCurrent().close();
                }
                return false;
            }
        }
    };
</script>
