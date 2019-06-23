	<?php
        // $path = public_path('/certificate/IMG_3332.JPG');
        // $type = pathinfo($path, PATHINFO_EXTENSION);
        // $data = file_get_contents($path);
        // $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        
		$path1 = public_path('/certificate/frame.png');
        $type1 = pathinfo($path1, PATHINFO_EXTENSION);
        $data1 = file_get_contents($path1);
        $base641 = 'data:image/' . $type1 . ';base64,' . base64_encode($data1);


        $path2 = public_path('/certificate/middle_part.png');
        $type2 = pathinfo($path2, PATHINFO_EXTENSION);
        $data2 = file_get_contents($path2);
        $base642 = 'data:image/' . $type2 . ';base64,' . base64_encode($data2);
		/*
        
    	  


        $path3 = public_path('/certificate/band.png');
        $type3 = pathinfo($path3, PATHINFO_EXTENSION);
        $data3 = file_get_contents($path3);
        $base643 = 'data:image/' . $type3 . ';base64,' . base64_encode($data3);
        */
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<title>Krogarna.se Certificate</title>

<script type="text/javascript" src="html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<style type="text/css" media="print">

	{
	left:0px !important;
	width:11in !important;
	height:8.5in !important;
	font-size:107% !important;
	}
	@page {
	    
		margin: 0;  /* this affects the margin in the printer settings */
		body {transform: scale(1);}
	}
	
	
</style>

<style type="text/css" media="all">
    #top {
height: 100%;
}
#position_me {
left: 0;
}

    .SlideBackGround
    {
        height:650px;
        width:880px;
        position:fixed;
        margin:10px 10px 10px 10px;
        background-color:white;
        background-image:url({{$base641}});
        background-size:880px 650px;
        background-repeat:no-repeat;
        z-index: 2;
        filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{{$base641}}',sizingMethod='scale');
        -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{{$base641}}',sizingMethod='scale')";

    }
    .MiddlePart
    {
    height:170px;
    width:670px;
    position:fixed;
    left:125px;
    top:80px;
    background-image:url(middle_part.png);
    background-size:670px 170px;
    background-repeat:no-repeat;
    z-index: 5;
            filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='middle_part.png',sizingMethod='scale');
            -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='middle_part.png',sizingMethod='scale')";
    }
    
    .Seal
    {
    height:90px;
    width:90px;
    position:fixed;
    left:415px;
    top:420px;
    background-image:url(sigill.png);
    background-size:90px 90px;
    background-repeat:no-repeat;
    z-index: 5;
                filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='sigill.png',sizingMethod='scale');
                -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='sigill.png',sizingMethod='scale')";
    
        }
    
    .Ribbon
   {
    
    width:60px;
    height:90px;
    position:fixed;
    left:435px;
    top:520px;
    background-image:url(band.png);
    background-size:60px 90px;
    background-repeat:no-repeat;
    z-index: 5;
                filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='band.png',sizingMethod='scale');
                -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='band.png',sizingMethod='scale')";
    
        }
    
    .Signature
    {
    width:180px;
    height:90px;
    position:fixed;
    left:582px;
    top:517px;
      
    background-image:url(signature.png);
    background-size:180px 90px;
    background-repeat:no-repeat;
    z-index: 11;
      filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='signature.png',sizingMethod='scale');
    -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='signature.png',sizingMethod='scale')";
    
    }
    
    .DateLine
    {
    width:300px;
    position:fixed;
    left:112px;
    top:570px;
    z-index:11;
    }
    
    .ExaminerLine
    {
    width:300px;
    position:fixed;
    left:500px;
    top:570px;
    z-index:11;
    }
    
    .ExaminerText
    {
    width:270px;
    position:fixed;
    left:632px;
    top:585px;
    color:#8B7B67;
    z-index:11;
    }
    
    .DateText
    {
    width:270px;
    position:fixed;
    left:232px;
    top:585px;
    z-index:11;
    color:#8B7B67;
    }
    
    .ParagraphSmall
    {
    height:200px;
    width:572px;
    position:fixed;
    left:170px;
    top:350px;
    font-size:13px;
    text-align:center;
    z-index:11;
    color:#8B7B67;
    }
    
    .ParagraphMedium
    {
    height:200px;
    width:420px;
    position:fixed;
    left:250px;
    top:260px;
    font-size:14px;
    text-align:center;
    z-index:11;
    color:#8B7B67;
    }
    
    .HeadingLarge
    {
    height:200px;
    width:640px;
    position:fixed;
    left:140px;
    top:130px;
    font-size:60px;
    z-index:11;
    color:#8B7B67;
    }
    
    .MiddleLine
    {
    width:720px;
    position:fixed;
    left:100px;
    top:330px;
    z-index:11;
    color:#8B7B67;
    }
    
    .StudentName
    {
    font-weight:bold;
    height:200px;
    width:720px;
    position:fixed;
    left:97px;
    top:310px;
    font-size:18px;
    text-align:center;
    z-index:11;
    color:#8B7B67;
    }
    
    .CompletionDate
    {
    position:fixed;
    left:225px;
    top:555px;
    z-index:11;
    color:#8B7B67;
    text-align:center;
    }
    
</style>
</head>

<body >

<!-- <a href="javascript:genPDF()">Download PDF</a>  -->
<div id="content">
<div id="editor"></div>
<div class="SlideBackGround" style="height:650px;
        width:980px;
        position:fixed;
        margin:10px 10px 10px 10px;
        background-color:white;
        background-size:880px 650px;
        background-repeat:no-repeat;
        z-index: 2;">
	<img src="{{$base641}}" width="100%" style="height:650px;
        width:980px;
        position:fixed;
        margin:10px 10px 10px 10px;
        background-color:white;
        background-size:880px 650px;
        background-repeat:no-repeat;
        z-index: 2;">
</div>

<div class="MiddlePart">
	<img src="{{$base642}}" width="100%" style="height:170px;
    width:670px;
    position:fixed;
    left:125px;
    top:80px;">
</div>

<div class="HeadingLarge">COURSE CERTIFICATE</div>

<div class="ParagraphMedium">This is to certify</div>
<div class="ParagraphSmall">
	with the registration no 1212 has successfully completed the online course <br><b style="font-size:18px">"Advanced PHP Programming"</b><br/> taught by <b>ABDUL KALAM</b> conducted from <b>Jun 1st 2018</b> to <b>Apr 2nd 2018</b> under the platform unnoto.com.
</div>

<div class="Seal"></div>

<div class="Ribbon"></div>

<hr class="DateLine" />

<hr class="ExaminerLine" />

<hr class="MiddleLine" />

<div class="DateText">Date</div>

<div class="ExaminerText">Examiner</div>

<div class="Signature"></div>

<div class="CompletionDate">1/1/2014</div>
<div class="StudentName">John Doe</div>

</div>
<script>
function genPDF()
  {
   html2canvas(document.body,{
   onrendered:function(canvas){

   var img=canvas.toDataURL("image/png");
   var doc = new jsPDF();
   doc.addImage(img,'JPEG',20,20);
   doc.save('test.pdf');
   }

   });

  }
  </script>

</script>
</body>

</html>
