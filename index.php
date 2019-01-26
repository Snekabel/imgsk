<html>
<head>
  <style>
    * {
      margin: 0;
      padding: 0;
      border: 0;
      box-sizing: border-box;
    }
    body {
      background-color: #141518;
    }
    .header {
      height: 50px;
      background-color: #34373c;
      width: 100%;
      position: relative;
    }

    .header .logo {
      height: 34px;
      margin: 8px 0 8px 50px;
    }

    .bg {
      background: rbga(0,0,0,0.5);
    }

    .main {
       background-color: #45484f;
       padding: 25px;
       border-radius: 5px;
       box-shadow: 0 5px 15px 0 rgba(0,0,0,.5);
       position: absolute;
       left: 50%;
       top: 50%;
       transform: translateY(-50%) translateX(-50%);
       height: 450px;
       width: 680px;
    }

    .main.floating {
      background-color: #292c31;
    }

    .mainActions {
      margin: 85px auto 0;
      width: 420px;
    }

    .dragndrop {
        border: 2px dotted #bbb;
        border-radius: 5px;
        width: 150px;
        height: 100px;
        margin: 0 auto;
    }
    .filebox {
      text-align: center;
      margin-top: 50px;
    }

    .filebox input {
          display: none;
    }

    .filebox label {
      display: inline-block;
      color: #333;
      padding: 4px 15px;
      margin: 0 5px;
      border-radius: 3px;
      background-image: linear-gradient(to bottom,#e0e0e0,#b7b7b7);
      box-shadow: 0 2px 4px 0 rgba(0,0,0,.5);
    }
    .urlbox {
      margin-top: 20px;
      width: 100%;
    }
    .urlbox input {
      padding: 12px;
      width: 100%;
      font-size: 14px;
      text-align: center;
      border: 2px solid white;
      box-shadow: inset 0 2px 6px 0 rgba(0,0,0,.26);
      border-radius: 5px;
      outline: 0;
      background-color: #45484f;
      border: 1px solid rgba(255,255,255,.38);
      color: #696969;
    }
  </style>
</head>
<body>
  <div class="header">
    <img class="logo" src="2955055689020172556.png"/>
  </div>
  <div class="overlay">
    <div class="bg"></div>
    <div class="main">
      <form enctype="multipart/form-data" method="POST" action="https://u.dh.ax">
        <div class="mainActions">
          <div class="dragndrop">

          </div>
          <div class="filebox">
            <input type="file" name="files[]" id="upfile" multiple="" accept=".jpg,.jpeg,.png,.gif,.apng,.tiff,.tif,.bmp,.xcf,.webp,.mp4,.mov"/>
            <label id="browse">Browse</label> <span>or drag images here</span>
          </div>
          <div class="urlbox">
            <input type="text" placeholder="Paste Image or URL" />
          </div>
          <button>Upload</button>
        </div>
      </form>
    </div>
  </div>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script>
    var browse = document.getElementById("browse");
    browse.addEventListener("click",function(e) {
      e.preventDefault();
      var fileup = document.getElementById("upfile");
      fileup.click();
    })

    var droppedFiles = false;


    var dragndrop = $('.dragndrop');
    var main = $(".main");
    dragndrop.on('drag dragstart dragend dragover dragenter dragleave drop', function(e) {
      e.preventDefault();
      e.stopPropagation();
    })
    .on('dragover dragenter', function() {
      //console.log("FLOATING!");
      //console.log(main);
      main.addClass('floating');
    })
    .on('dragleave dragend drop', function() {
      main.removeClass('floating');
    })
    .on('drop', function(e) {
      droppedFiles = e.originalEvent.dataTransfer.files;
      console.log(droppedFiles);
      var fileinput = $("#upfile").prop('files', droppedFiles);
    });
  </script>
</body>
</html>
