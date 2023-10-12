<script setup>
import Editor from "@tinymce/tinymce-vue";
const props = defineProps({
    text: String,
});
</script>
<template>
    <editor
        api-key="k9n2673bajx9jmu82ecivkz5hec6yvtt82h17axug3nl3fw7"
        :init="{
            height: 600,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount',
            ],
            toolbar:
                'undo redo | formatselect | bold italic backcolor | \
           alignleft aligncenter alignright alignjustify | \
           bullist numlist outdent indent | removeformat | help',
        }"
    />
</template>
