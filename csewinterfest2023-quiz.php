<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Beau+Rivage&family=Permanent+Marker&display=swap" rel="stylesheet">

    <style>
        .name {
            position: absolute;
            top: 430px;
            text-align: center;
            width: calc(3627px / 3);
            font-size: 56px;
            font-weight: bold;
            font-family: 'Beau Rivage', cursive;
            /* font-family: 'Permanent Marker', cursive; */
        }

        /* .name div{
            text-transform: lowercase;
        }

        .name div:first-letter {
            text-transform: uppercase;
        } */

        .position {
            position: absolute;
            top: 500px;
            text-align: center;
            width: calc(calc(3627px / 3) - 350px);
            font-size: 56px;
            font-weight: bold;
            font-family: 'Beau Rivage', cursive;
            /* font-family: 'Permanent Marker', cursive; */
        }

        .desc {
            position: absolute;
            top: 270px;
            text-align: center;
            width: calc(3627px / 3);
            font-size: 18px;
            line-height: 1.8rem;
        }

        .border {

            border-style: double;
        }

        .watermark {
            position: absolute;
            bottom: 20px;
            text-align: center;
            width: calc(3627px / 3);
            font-size: 8px;
            opacity: 0.0;
        }
    </style>
</head>

<body>

    <button onclick="downloadTranscripts()">Generate and Send Certificate</button>
    <div id="process"></div>
    <div class="container">

    </div>

    <div class="emailforms">

    </div>
    <script>
        const data = [{
                "Name": "Farzana Akter",
                "Email": "sinthiyafarzana@gmail.com",
                "Position": "3rd"
            },
            {
                "Name": "Ishrat Jahan Ani",
                "Email": "ishratjahan.anee2020@gmail.com ",
                "Position": "2nd"
            },
            {
                "Name": "Hasan Imran Nazir",
                "Email": "hin26@outlook.com",
                "Position": "1st"
            }
        ];

        const check_data = [
            {
                "Name": "Abdur Rahman Riad",
                "Email": 'rahmanriad.cse@gmail.com',
                "Position": "1st"
            },
            {
                "Name": "Shazzad Hossain Mazumder",
                "Email": 'shmazumder23@gmail.com',
                "Position": "10000th"
            }
        ];

        let process = [...data, ...check_data];


        let _width = 3627 / 3;
        let _height = 2600 / 3;

        $(document).ready(function() {
            
            console.log(process);
            $(process).each(function(i, elm) {
                // let i = 0;
                console.log(elm);
                let position = (elm[i]['Position']);
                let position_intpart = parseInt(position);
                let position_postfix = (position).replace(position_intpart, "");

                let email = (elm[i]['Email']);


                var img = `<div id='id_${(email.split("@")[0]).replaceAll(".", "")}' class='border' style='page-break-after: always; position:relative; width: ${_width}px; width0: calc(3627px / 3); height: ${_height}px; height0: calc(2600px / 3);'>
                    <img src='certificate quiz-01.png' style='width: 100%' />
                    <div class='name'>${(elm[i]['Name']).toLocaleLowerCase().split(" ").map((a)=>`${capitalizeFirstLetter(a)}`).join(" ")}</div>
                    <div class='position'>${position_intpart}<sup>${position_postfix}</sup></div>
                    <div class='watermark'>Developed by TDS</div>
                </div>
            `;

                $('.container').append(img);
            });

        });

        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
    </script>

    <script>
        function addScript(url) {
            var script = document.createElement("script");
            script.type = "application/javascript";
            script.src = url;
            document.head.appendChild(script);
        }
        addScript(
            "https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
        );
        addScript(
            "https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"
        );


        async function downloadTranscripts() {
            var doc = new jspdf.jsPDF({
                orientation: "l",
                unit: "pt",
                // format: "letter",
                format: [_height, _width]
            });

            let transcripts = $(".container div.border");

            for (let index = 0; index < transcripts.length; index++) {
                let elm = transcripts[index];
                let id = $(elm).prop("id");
                let stdid = (id.replaceAll("#id_", "").split("@")[0]).replaceAll(".", "");
                console.log("processing=>", id);
                $('#process').html(`processing: ${id} (${index+1}/${transcripts.length})`);
                let canvas = await html2canvas(document.querySelector(`#${id}`), {
                    scale: 3,
                });

                let img = canvas.toDataURL("image/jpeg", 0.95); //.replace("image/jpeg", "image/octet-stream");

                const pageWidth = doc.internal.pageSize.getWidth();
                const pageHeight = doc.internal.pageSize.getHeight();

                const widthRatio = pageWidth / canvas.width;
                const heightRatio = pageHeight / canvas.height;
                const ratio = widthRatio > heightRatio ? heightRatio : widthRatio;

                const canvasWidth = (canvas.width * ratio) - 40;
                const canvasHeight = (canvas.height * ratio) - 40;

                const marginX = ((pageWidth - canvasWidth) / 2);
                const marginY = (pageHeight - canvasHeight) / 2;

                doc.addImage(img, "JPEG", marginX, marginY, canvasWidth, canvasHeight);
                doc.addPage();
                console.log("processing complete=>", stdid);


                var aData = process[index];
                await sendEmail(img, aData['Email'], aData['Name']);
            }

            doc.save("41-certificates-for-winterfest-quiz.pdf");
        }

        function base64toBlob(base64Data, contentType) {
            contentType = contentType || '';
            var sliceSize = 1024;
            var byteCharacters = atob(base64Data);
            var bytesLength = byteCharacters.length;
            var slicesCount = Math.ceil(bytesLength / sliceSize);
            var byteArrays = new Array(slicesCount);

            for (var sliceIndex = 0; sliceIndex < slicesCount; ++sliceIndex) {
                var begin = sliceIndex * sliceSize;
                var end = Math.min(begin + sliceSize, bytesLength);

                var bytes = new Array(end - begin);
                for (var offset = begin, i = 0; offset < end; ++i, ++offset) {
                    bytes[i] = byteCharacters[offset].charCodeAt(0);
                }
                byteArrays[sliceIndex] = new Uint8Array(bytes);
            }
            return new Blob(byteArrays, {
                type: contentType
            });
        }

        function sendEmail(img, email, name) {

            // console.log(img);

            var base64ImageContent = img.replace(/^data:image\/(png|jpg|jpeg);base64,/, "");
            var blob = base64toBlob(base64ImageContent, 'image/png');
            var formData = new FormData();
            formData.append('email', email, );
            formData.append('name', name, );
            formData.append('subject', "Certificate of Achievement | CSE Winter Fest 2023 (Quiz)", );
            formData.append('message', `Dear ${name},\nCongratulation on your achievement in CSE Winter Fest 2023 (Quiz). Please check your certificate.\nThanks.`, );
            formData.append('attachment', blob);

            return new Promise((res, rej) => {
                $.ajax({
                    url: 'email.php',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    type: 'POST',
                    success: (resp) => {
                        resp = JSON.parse(resp);

                        if (!resp.error) {
                            res();
                        }
                    }
                });

            })
        }
    </script>
</body>

</html>