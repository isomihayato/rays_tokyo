$.getScript('https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.js',function(){
  // instantiate the uploader
  $('#file-dropzone').dropzone({
    url: "/tattoos",
    maxFilesize: 100,
    paramName: "images",
    maxThumbnailFilesize: 99999,
    previewsContainer: '.visualizacao',
    previewTemplate : $('.preview').html(),
    init: function() {
      this.on('completemultiple', function(file, json) {
        $('.sortable').sortable('enable');
      });
      this.on('success', function(file, json) {
      });

      this.on('addedfile', function(file) {

      });

      this.on('drop', function(file) {

      });
    }
  });
});
