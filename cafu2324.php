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
            top: 405px;
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
            top: 475px;
            text-align: center;
            width: calc(3627px / 3);
            font-size: 28px;
            font-weight: bold;
            /* font-family: 'Beau Rivage', cursive; */
            /* font-family: 'Permanent Marker', cursive; */
            font-family: monospace;
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
            "Name": "Mr. Fazle Rabbi",
            "Position": "Coordinator",
            "Email": "fazlerabbi@feniuniversity.edu.bd"
        }, {
            "Name": "Mahfuzul Karim",
            "Position": "General Secretary",
            "Email": "mahfuzul.karim99@gmail.com"
        }, {
            "Name": "Ekramul Karim Soykot",
            "Position": "Joint Secretary (Programs)",
            "Email": "ekramrock94@gmail.com"
        }, {
            "Name": "Md. Shafayet Hossain",
            "Position": "Joint Secretary (Publicity & Public Relation)",
            "Email": "shafayet19ohi@gmail.com"
        }, {
            "Name": "Sabrina Tabassum",
            "Position": "Joint Secretary (General)",
            "Email": "tabassumsabrina1@gmail.com"
        }, {
            "Name": "Iftekhar Bin Mohiuddin",
            "Position": "Joint Secretary (Organizing)",
            "Email": "iftekharbinmohiuddin@gmail.com"
        }, {
            "Name": "Abul Hasnat Asif",
            "Position": "Finance Secretary",
            "Email": "md2010883@gmail.com"
        }, {
            "Name": "Md. Tanvir Haider Shuvo",
            "Position": "Executive Member",
            "Email": "mtanvirshuvi00@gmail.com"
        }, {
            "Name": "Faria Binte Islam",
            "Position": "Executive Member",
            "Email": "fariatasbin165@gmail.com"
        }, {
            "Name": "Ariful Islam",
            "Position": "Executive Member",
            "Email": "arifulfeni92@gmail.com"
        }, {
            "Name": "Md. Masud Rana",
            "Position": "Executive Member",
            "Email": "promasudrana@gmail.com"
        }, {
            "Name": "Md. Abdul Wohab",
            "Position": "Executive Member",
            "Email": "mdwohab121@gmail.com"
        }, {
            "Name": "Md. Asaduzzaman Ayon",
            "Position": "Executive Member",
            "Email": "azayon24@gmail.com"
        }, {
            "Name": "Sraboni Debi",
            "Position": "Executive Member",
            "Email": "srabonidebi92@gmail.com"
        }, {
            "Name": "Md. Sanjid Hossen",
            "Position": "Executive Member",
            "Email": "sniloy101@gmail.com"
        }, {
            "Name": "Seheria Akter Era",
            "Position": "Executive Member",
            "Email": "era.chowdhury3921@gmail.com"
        }, {
            "Name": "Md. Akram Hossain",
            "Position": "Executive Member",
            "Email": "akramanam09@gmail.com"
        }, {
            "Name": "Ifti Nowal Chowdhury",
            "Position": "Executive Member",
            "Email": "faiazmd809@gmail.com"
        }, {
            "Name": "Anindita Saha",
            "Position": "Executive Member",
            "Email": "rahulinforu08@gmail.com"
        }, {
            "Name": "Ahmed Tasin Arman Abir",
            "Position": "Executive Member",
            "Email": "armanabir0124@gmail.com"
        }, {
            "Name": "Omar Faruk",
            "Position": "Executive Member",
            "Email": "omarfaruk01705@gmail.com"
        }];

        const check_data = [];
        // [{
        //         "Name": "Abdur Rahman Riad",
        //         "Email": 'rahmanriad.cse@gmail.com',
        //         "Position": "Sera"
        //     },
        //     {
        //         "Name": "Shazzad Hossain Mazumder",
        //         "Email": 'shmazumder23@gmail.com',
        //         "Position": "None of Consequence"
        //     },

        // ];

        let process = [...data, ...check_data];


        let _width = 3627 / 3;
        let _height = 2600 / 3;

        $(document).ready(function() {

            console.log(process);
            $(process).each(function(i, elm) {
                // let i = 0;
                console.log(elm);
                let position = (elm['Position']);

                let email = elm['Email'] ? elm['Email'] : `none${i}@gmail.com`;


                var img = `<div id='id_${(email.split("@")[0]).replaceAll(".", "")}' class='border' style='page-break-after: always; position:relative; width: ${_width}px; width0: calc(3627px / 3); height: ${_height}px; height0: calc(2600px / 3);'>
                    <img src='CAFU 2023-2024/Cerificate Design CAFU.jpeg' style='width: 100%' />
                    <div class='name'>${(elm['Name']).toLocaleLowerCase().split(" ").map((a)=>`${capitalizeFirstLetter(a)}`).join(" ")}</div>
                    <div class='position'>${position}</div>
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

        const individualDownload = false;

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
                if (aData['Email']) {
                    await sendEmail(img, aData['Email'], aData['Name']);
                }

                if (individualDownload) {
                    var a = document.createElement('a');
                    a.href = img;
                    a.download = `${aData['Name'].split(" ").join("_")}_EC_Certificate.png`;
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                }
            }

            if (!individualDownload) {
                doc.save(transcripts.length + "-certificates-for-cafu-2324.pdf");
            }
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
            formData.append('subject', "Certificate of Appreciation | CAFU Executive Committee 2023-24", );
            formData.append('message', `Dear ${name},\nThank you for your contribution to CSE Association Feni University (CAFU).\nThanks.`, );
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