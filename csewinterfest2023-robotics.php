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
        // const data = [{
        //         "Name": "Farzana Akter",
        //         "Email": "sinthiyafarzana@gmail.com"
        //     },
        //     {
        //         "Name": "Kazi Mohammad Abu Sayed",
        //         "Email": "kazimohmmadabusayed@gmail.com"
        //     },
        //     {
        //         "Name": "Kazi Md. Baha Uddin Faruqi",
        //         "Email": "bahauddinfaruqi@gmail.com"
        //     },
        //     {
        //         "Name": "Md. Mehedi Hasan",
        //         "Email": "mahdihasan112358@gmail "
        //     },
        //     {
        //         "Name": "MD Jahid Hossain ",
        //         "Email": "jahid212522@gmail.com"
        //     },
        //     {
        //         "Name": "Anisur Rahman Bhuiyan",
        //         "Email": "anisur.ayaan@gmail.com"
        //     },
        //     {
        //         "Name": "Tahsin Bin Harun Mazumder",
        //         "Email": "shadidmazumder123@gmail.com"
        //     },
        //     {
        //         "Name": "Abdullah Al Mamun Zishan ",
        //         "Email": "zafarahmed01071969@gmail.com"
        //     },
        //     {
        //         "Name": "Jyoti Mondal Yuthi ",
        //         "Email": "Mondaljyoti594@gmail.com"
        //     },
        //     {
        //         "Name": "Sabina Binth Belal",
        //         "Email": "sabinatisha04@gmail.com"
        //     },
        //     {
        //         "Name": "Faria Afrin Isha",
        //         "Email": "fariaisha27@gmail.com"
        //     },
        //     {
        //         "Name": "Taisin Nigar Tisha",
        //         "Email": "nigartisha321.taisin@gmail.com"
        //     },
        //     {
        //         "Name": "Tasmin Tamanna",
        //         "Email": "tasminnisha128@gmail.com"
        //     },
        //     {
        //         "Name": "Nadia Tanjum Jarin ",
        //         "Email": "nadiatanjum1602@gmail.com"
        //     },
        //     {
        //         "Name": "Nasrin Sultana Popy",
        //         "Email": "nasrinpopy1234@gmail.com"
        //     },
        //     {
        //         "Name": "Anindita Saha ",
        //         "Email": "swarnafu28@gmail.com"
        //     },
        //     {
        //         "Name": "Nusrat Jahan Prity",
        //         "Email": "nusratprityprity@gmail.com"
        //     },
        //     {
        //         "Name": "Aksa Mahmud ",
        //         "Email": "aksamahmud7822@gmail.com"
        //     },
        //     {
        //         "Name": "Sabrina Sultana",
        //         "Email": "sabrinaprity898@gmail.com"
        //     },
        //     {
        //         "Name": "Farjana Akter ",
        //         "Email": "farjanasuborna644@gmail.com"
        //     },
        //     {
        //         "Name": "Mobashara ",
        //         "Email": "mobashara.fu.cse@gmail.com"
        //     },
        //     {
        //         "Name": "Ishrat Jahan Ani",
        //         "Email": "ishratjahan.anee2020@gmail.com "
        //     },
        //     {
        //         "Name": "Maliha Mahmuda",
        //         "Email": "mahmudamaliha65@gmail "
        //     },
        //     {
        //         "Name": "Sonya karmakar ",
        //         "Email": "sonyakarmakar30@gmail.com"
        //     },
        //     {
        //         "Name": "Sadia Tayeeba ",
        //         "Email": "tayeebasadia@gmail.com"
        //     },
        //     {
        //         "Name": "Sadia Akter",
        //         "Email": "Sadiaripa24@gmail.com"
        //     },
        //     {
        //         "Name": "Humayra Tanzila",
        //         "Email": "humayratanzila556@gmail.com"
        //     },
        //     {
        //         "Name": "MD. Kawsar Mahmud ",
        //         "Email": "kawsarmahmud822@gmail.com"
        //     },
        //     {
        //         "Name": "Seheria Akter",
        //         "Email": "era.chowdhury3921@gmail.com"
        //     },
        //     {
        //         "Name": "Robin deb nath ",
        //         "Email": "robindevnath2210@gmail "
        //     },
        //     {
        //         "Name": "Zahirul Islam",
        //         "Email": "zahirulshahin190@gmail.com"
        //     },
        //     {
        //         "Name": "Shahria Hossain",
        //         "Email": "shahriahosseinushar@gmail.com"
        //     },
        //     {
        //         "Name": "Izazur Rahman Ratib",
        //         "Email": "mohammadisrak62@gmail.com"
        //     },
        //     {
        //         "Name": "Md Abdul Al Noman",
        //         "Email": "mdabdulalnoman07@gmail.com"
        //     },
        //     {
        //         "Name": "Ikbal Hosen Raihan",
        //         "Email": "ikbalraihan18@gmail.com"
        //     },
        //     {
        //         "Name": "Madhubi Rani Sutro Dhor",
        //         "Email": "pnodeskumar85@gmail.com"
        //     },
        //     {
        //         "Name": "MAHFUZUR RAHMAN",
        //         "Email": "myselfmahin77@gmail.com"
        //     },
        //     {
        //         "Name": "Md Mahedi Hasan Noyon",
        //         "Email": "mmd033744@gmail "
        //     },
        //     {
        //         "Name": "Fariya Sultana ",
        //         "Email": "fariyasultana9928@gmail.com"
        //     },
        //     {
        //         "Name": "Durjoy datta",
        //         "Email": "durjaydatta5@gmail.com"
        //     },
        //     {
        //         "Name": "Towhid Al Rabe",
        //         "Email": "alrabitowhid@gmail.com"
        //     }
        // ];

        const data = [{
            "Name": "Riad Rahman",
            "Email": 'rahmanriad.cse@gmail.com',
        }]

        let _width = 3627 / 3;
        let _height = 2600 / 3;

        $(document).ready(function() {

            $(data).each(function(i, elm) {
                // let i = 0;

                let email = (data[i]['Email']);


                var img = `<div id='id_${(email.split("@")[0]).replaceAll(".", "")}' class='border' style='page-break-after: always; position:relative; width: ${_width}px; width0: calc(3627px / 3); height: ${_height}px; height0: calc(2600px / 3);'>
                    <img src='certificate robotics hands on session-01.png' style='width: 100%' />
                    <div class='name'>${(data[i]['Name']).toLocaleLowerCase().split(" ").map((a)=>`${capitalizeFirstLetter(a)}`).join(" ")}</div>

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


                var aData = data[index];
                await sendEmail(img, aData['Email'], aData['Name']);
            }

            doc.save("41-certificates-for-winterfest-robotics.pdf");
        }

        function sendEmail(img, email, name) {
            return new Promise((res, rej) => {
                $.ajax({
                    url: 'email.php',
                    cache: false,
                    enctype: 'multipart/form-data',
                    data: {
                        email: email,
                        name: name,
                        attachment: img,
                        subject: "Certificate of Participation | CSE Winter Fest 2023 (Robotics)",
                        message: `Dear ${name}, Thank you for your participation. Please check your certificate. Thanks.`,
                    },
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