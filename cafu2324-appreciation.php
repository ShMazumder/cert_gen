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
            top: 335px;
            text-align: center;
            width: calc(3627px / 3);
            font-size: 60px;
            font-weight: bold;
            font-family: 'Beau Rivage', cursive;
            /* font-family: 'Permanent Marker', cursive;*/
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
            "Name": "FARIA AFRIN",
            "Email": "fariaisha27@gmail.com"
        }, {
            "Name": "MD. MAJADUL ISLAM",
            "Email": "majadulislam3012@gmail.com"
        }, {
            "Name": "IFTEKHAR BIN MOHIUDDIN",
            "Email": "iftekharbinmohiuddin@gmail.com"
        }, {
            "Name": "FAHMID BIN MOSARAF",
            "Email": "fahmidfamel396@gmail.com"
        }, {
            "Name": "KAZI TANVIR HOSSAIN",
            "Email": "ahnafraj445@gmail.com"
        }, {
            "Name": "MD. SANJID HOSSEN",
            "Email": "sniloy101@gmail.com"
        }, {
            "Name": "MD KAWSAR MAHMUD",
            "Email": "kawsarmahmud822@gmail.com"
        }, {
            "Name": "MD. RASHEDUL HOQUE SIFAT",
            "Email": "rashedulhaquesifat@gmail.com"
        }, {
            "Name": "IFTI NOWAL CHOWDHURY",
            "Email": "faiazmd809@gmail.com"
        }, {
            "Name": "SHEIKH AHAMED",
            "Email": "shezan0104@gmail.com"
        }, {
            "Name": "AKSA MAHMUD",
            "Email": "aksamahmud7822@gmail.com"
        }, {
            "Name": "MOHAMMAD SHAHARIAR HOSSAIN",
            "Email": "shtttanim92@gmail.com"
        }, {
            "Name": "MAHMUDUL HASAN",
            "Email": "mhshibli017@gmail.com"
        }, {
            "Name": "TASMIMA TABASSUM SHAZIN",
            "Email": "sejintabassum@gmail.com"
        }, {
            "Name": "OMAR FARUK",
            "Email": "omarfaruk01705@gmail.com"
        }, {
            "Name": "MOMTAJ AKTER",
            "Email": "romanhaydar@gmail.com"
        }, {
            "Name": "ABUL HASNAT ASIF",
            "Email": "md2010883@gmail.com"
        }, {
            "Name": "EKRAMUL KARIM SOYKOT",
            "Email": "ekramrock94@gmail.com"
        }, {
            "Name": "DURJOY DATTA",
            "Email": "durjaydatta5@gmail.com"
        }, {
            "Name": "MD. SAIDUR RAHMAN",
            "Email": "saidurrahman4690@gmail.com"
        }, {
            "Name": "SABRINA TABASSUM",
            "Email": "tabassumsabrina1@gmail.com"
        }, {
            "Name": "MD. SHAFAYET HOSSAIN",
            "Email": "shafayet19ohi@gmail.com"
        }, {
            "Name": "MAHFUZUL KARIM",
            "Email": "mahfuzul.karim99@gmail.com"
        }, {
            "Name": "MD. AKRAM HOSSAIN",
            "Email": "akramanam09@gmail.com"
        }, {
            "Name": "TOWHID AL RABE",
            "Email": "alrabitowhid@gmail.com"
        }];

        const check_data = [{
                "Name": "Abdur Rahman Riad",
                "Email": 'rahmanriad.cse@gmail.com',
                "Position": "Sera"
            },
            {
                "Name": "Shazzad Hossain Mazumder",
                "Email": 'shmazumder23@gmail.com',
                "Position": "None of Consequence"
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
                let position = (elm['Position'] || "");

                let email = elm['Email'] ? elm['Email'] : `none${i}@gmail.com`;


                var img = `<div id='id_${(email.split("@")[0]).replaceAll(".", "")}' class='border' style='page-break-after: always; position:relative; width: ${_width}px; width0: calc(3627px / 3); height: ${_height}px; height0: calc(2600px / 3);'>
                    <img src='CAFU 2023-2024/Volunteer Certificate.jpeg' style='width: 100%' />
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
                    a.download = `${aData['Name'].split(" ").join("_")}_Appreciation_Certificate.png`;
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
            formData.append('subject', "Certificate of Appreciation | Voluntary 2023", );
            formData.append('message', `Dear ${name},\nThank you for your voluntary contribution to the Department of CSE, Feni University.\nThanks.`, );
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