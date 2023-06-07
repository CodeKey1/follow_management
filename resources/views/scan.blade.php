<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>مكتب السيد المحافظ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.css">
    <link rel="stylesheet" href="./scan/styles.css">
    <link rel="stylesheet" href="./scan/pdfannotate.css">
</head>

<body>
    <div class="toolbar">
        <input class="user-name text-bold-700 float-left" type="hidden" name="posta_file" value="">
        <div class="tool">
            <span>تأشيرة السيد المحافظ</span>
        </div>
        <div class="tool">
            <label for="">Brush size</label>
            <input type="number" class="form-control text-right" value="1" id="brush-size" max="50" />
        </div>
        <div class="tool">
            <label for="">Font size</label>
            <select id="font-size" class="form-control">
                <option value="10">10</option>
                <option value="12">12</option>
                <option value="16" selected>16</option>
                <option value="18">18</option>
                <option value="24">24</option>
                <option value="32">32</option>
                <option value="48">48</option>
                <option value="64">64</option>
                <option value="72">72</option>
                <option value="108">108</option>
            </select>
        </div>
        <div class="tool">
            <button class="color-tool active" style="background-color: #212121;"></button>
            <button class="color-tool" style="background-color: red;"></button>
            <button class="color-tool" style="background-color: blue;"></button>
            <button class="color-tool" style="background-color: green;"></button>
            <button class="color-tool" style="background-color: yellow;"></button>
        </div>
        <div class="tool">
            <button class="tool-button active"><i class="fa fa-hand-paper-o" title="Free Hand"
                    onclick="enableSelector(event)"></i></button>
        </div>
        <div class="tool">
            <button class="tool-button"><i class="fa fa-pencil" title="Pencil"
                    onclick="enablePencil(event)"></i></button>
        </div>
        <div class="tool">
            <button class="tool-button"><i class="fa fa-font" title="Add Text"
                    onclick="enableAddText(event)"></i></button>
        </div>

        <div class="tool">
            <button class="btn btn-danger btn-sm" onclick="clearPage()"> مسح </button>
        </div>
            <div class="tool">
                <input type="text" id="pdf" name="posta_file">
                <button class="btn btn-light btn-sm" type="button" onclick="savePDF()"><i class="fa fa-save"></i> حفظ</button>
            </div>

    </div>
    <div id="pdf-container">

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"></script>
    <script>
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.worker.min.js';
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.3.0/fabric.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.2.0/jspdf.umd.min.js"></script>
    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.js"></script>
    <script src="./scan/arrow.fabric.js"></script>
    <script src="./scan/pdfannotate.js"></script>
    <script src="./scan/script.js"></script>
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
                '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();

        var pdf = new PDFAnnotate('pdf-container',
            '{{ URL::to('attatch_office/export_follow/' . $Gsignatur->posta_file) }}', {
                onPageUpdated(page, oldData, newData) {
                    console.log(page, oldData, newData);
                },
                ready() {
                    console.log('Plugin initialized successfully');
                },
                scale: 1.5,
                pageImageCompression: 'MEDIUM', // FAST, MEDIUM, SLOW(Helps to control the new PDF file size)
            });
    </script>
    <script>
        $(function() {
                    document.addEventListener("PDFAnnotate", function() {
                        document.getElementById("pdf").value = getDay()
                    })
            });
    </script>
</body>

</html>
