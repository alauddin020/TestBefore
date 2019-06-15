 var siteUrl = '{{URL::to('/')}}';
    function imagePreview(input)
    {
        if (input.files && input.files[0])
        {
            var reader = new FileReader();
            reader.onload = function (e)
            {
                $('#imagePreviewShow').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
// If user tries to upload videos other than these extension , it will throw error.
function isVideo(filename) {
    var ext = getExtension(filename);
    switch (ext.toLowerCase()) {
    case 'm4v':
    case 'avi':
    case 'mpg':
    case 'mp4':
    case 'mov':
    case 'mpg':
    case 'mpeg':
        // etc
        return true;
    }
    return false;
}
function getExtension(filename) {
    var parts = filename.split('.');
    return parts[parts.length - 1];
}
    $(document).ready(function ()
    {
       //alert(5);
       $('#video').on('change', function(){
      if (isVideo($(this).val())){
        $('.video-preview').attr('src', URL.createObjectURL(this.files[0]));
        $('.video-prev').show();
      }
      else
      {
        $('.upload-video-file').val('');
        $('.video-prev').hide();
        alert("Only video files are allowed to upload.")
      }
    });
        $('body').addClass('fa');
        $('#storeData').click(function (e)
        {
            e.preventDefault();
            var name    = $('#name').val();
            var email   = $('#email').val();
            var photo   = $('#photo').val();
            var video   = $('#video').val();
            var expr = /^([a-z0-9_\.\-\+]{5,40})+\@(([a-z0-9\-]{4,40})+\.)+([a-z0-9]{2,5})+$/;
            var emailFormat = expr.test(email);
            if (name.length<3)
            {
                $('#nameError').show().html('Name Minimum 3 Character').fadeOut(4000);
                return false;
            }
            else if (!emailFormat)
            {
                $('#emailError').show().html('Email Address Not Valid').fadeOut(4000);
                return false;
            }
            else if (!photo.match(/(?:gif|jpeg|jpg|png|JPG|PNG|bmp)$/))
            {
                $('#photoError').show().html("Input file is not an image!").fadeOut(4000);
                return false;
            }
            else if (!video.match(/(?:mp4|avi|mkv|dat|3gp)$/))
            {
                $('#videoError').show().html("Input file is not an Video!").fadeOut(4000);
                return false;
            }
            else
            {
                var form = $('#addNewData')[0];
                var data = new FormData(form);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    xhr:function()
                    {
                      var xhr = new window.XMLHttpRequest();
                      xhr.upload.addEventListener("progress",function (e)
                      {
                          if (e.lengthComputable)
                          {
                              // console.log('Byte Loader '+e.loaded);
                              // console.log('Total Size '+e.total);
                              // console.log('Percentage '+(e.loaded/e.total));
                              var percent = Math.round((e.loaded/e.total)*100);
                              $('.progress').show();
                              $('.progress-bar').attr('aria-valuemin',percent).css('width',percent+'%').text(percent+'%');
                          }
                      });
                      return xhr;
                    },
                    type: "POST",
                    url: siteUrl + "/Add-New-Data",
                    mimeType: "multipart/form-data",
                    data: data,
                    processData: false,
                    contentType: false,
                    // cache: false,
                    // async: false,
                    dataType: "json",
                    success: function (data)
                    {
                        $('.progress').fadeOut(2000);
                        $('#status').show().html(data.success).fadeOut(4000);
                    }
                })
            }
        });
    });