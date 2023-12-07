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

    <style>
        .name {
            position: absolute;
            top: 215px;
            text-align: center;
            width: calc(1700px / 3);
            font-size: 24px;
            font-weight: bold;
        }


        .desc {
            position: absolute;
            top: 270px;
            text-align: center;
            width: calc(1700px / 3);
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
            width: calc(1700px / 3);
            font-size: 8px;
            opacity: 0.0;
        }
    </style>
</head>

<body>

    <button onclick="downloadTranscripts()">Download</button>
    <div id="process"></div>
    <div class="container">

    </div>
    <script>
        const data = [{
                "S.L": "1",
                "Name": "Azizul Hakim",
                "ID": "201011025",
                "Batch": "21st",
                "Mobile": "01875721332",
                "T-S": "XL",
                "Dept.": "BBA"
            },
            {
                "S.L": "2",
                "Name": "Minhazul Islam",
                "ID": "212011002",
                "Batch": "25th",
                "Mobile": "01822069436",
                "T-S": "XL",
                "Dept.": "BBA"
            },
            {
                "S.L": "3",
                "Name": "Md. Siam Sajid",
                "ID": "213011008",
                "Batch": "26th",
                "Mobile": "01963392068",
                "T-S": "XL",
                "Dept.": "BBA"
            },
            {
                "S.L": "4",
                "Name": "Puja Rani Das",
                "ID": "221011006",
                "Batch": "27th",
                "Mobile": "01839771933",
                "T-S": "XL",
                "Dept.": "BBA"
            },
            {
                "S.L": "5",
                "Name": "Wazid Al Ruhan",
                "ID": "221011015",
                "Batch": "27th",
                "Mobile": "01690189012",
                "T-S": "XL",
                "Dept.": "BBA"
            },
            {
                "S.L": "6",
                "Name": "Imtiaz Uddin",
                "ID": "201021001",
                "Batch": "21st",
                "Mobile": "01856037101",
                "T-S": "XL",
                "Dept.": "CE"
            },
            {
                "S.L": "7",
                "Name": "Adnan Sharif Mahmud",
                "ID": "201021005",
                "Batch": "21st",
                "Mobile": "01631084570",
                "T-S": "XL",
                "Dept.": "CE"
            },
            {
                "S.L": "9",
                "Name": "Abdullah Al Adnan Mozumder",
                "ID": "232021003",
                "Batch": "31st",
                "Mobile": "01859081848",
                "T-S": "M",
                "Dept.": "CE"
            },
            {
                "S.L": "10",
                "Name": "Sania e Zahan",
                "ID": "223022001",
                "Batch": "29th (DH)",
                "Mobile": "01890155061",
                "T-S": "XL",
                "Dept.": "CE"
            },
            {
                "S.L": "11",
                "Name": "Abul Hasnat Asif",
                "ID": "212031002",
                "Batch": "25th",
                "Mobile": "01839310774",
                "T-S": "XL",
                "Dept.": "CSE"
            },
            {
                "S.L": "12",
                "Name": "Sabrina Tabassum",
                "ID": "212031006",
                "Batch": "25th",
                "Mobile": "01980013714",
                "T-S": "L",
                "Dept.": "CSE"
            },
            {
                "S.L": "13",
                "Name": "Iftekhar Bin Mohiuddin",
                "ID": "213032003",
                "Batch": "26th",
                "Mobile": "01827295460",
                "T-S": "XXL",
                "Dept.": "CSE"
            },
            {
                "S.L": "14",
                "Name": "Tanvir Hossain Raj",
                "ID": "221031004",
                "Batch": "27th",
                "Mobile": "01875890181",
                "T-S": "XL",
                "Dept.": "CSE"
            },
            {
                "S.L": "15",
                "Name": "Ifti Nowal Chowdhury",
                "ID": "222031002",
                "Batch": "28th",
                "Mobile": "01628058269",
                "T-S": "XL",
                "Dept.": "CSE"
            },
            {
                "S.L": "16",
                "Name": "Tariqul Islam",
                "ID": "213042005",
                "Batch": "26th",
                "Mobile": "01820108676",
                "T-S": "XL",
                "Dept.": "EEE"
            },
            {
                "S.L": "17",
                "Name": "Azher Bin Hossain",
                "ID": "221041001",
                "Batch": "27th",
                "Mobile": "01321886003",
                "T-S": "L",
                "Dept.": "EEE"
            },
            {
                "S.L": "18",
                "Name": "Antor Kumar Nath",
                "ID": "221041005",
                "Batch": "27th",
                "Mobile": "01842764901",
                "T-S": "L",
                "Dept.": "EEE"
            },
            {
                "S.L": "19",
                "Name": "MD. Rubaiyat Hasan Rahin",
                "ID": "231041004",
                "Batch": "30th",
                "Mobile": "01632423477",
                "T-S": "XL",
                "Dept.": "EEE"
            },
            {
                "S.L": "20",
                "Name": "Md. Anowar Hossen",
                "ID": "201051002",
                "Batch": "21st",
                "Mobile": "01839737736",
                "T-S": "XL",
                "Dept.": "ENG"
            },
            {
                "S.L": "21",
                "Name": "Mehedi Hasan Tarek",
                "ID": "201051014",
                "Batch": "21st",
                "Mobile": "01631901761",
                "T-S": "L",
                "Dept.": "ENG"
            },
            {
                "S.L": "22",
                "Name": "Roksana Akter",
                "ID": "222051008",
                "Batch": "28st",
                "Mobile": "01746681726",
                "T-S": "L",
                "Dept.": "ENG"
            },
            {
                "S.L": "23",
                "Name": "Ruthan Mahmood",
                "ID": "231051002",
                "Batch": "30th",
                "Mobile": "01554322332",
                "T-S": "L",
                "Dept.": "ENG"
            },
            {
                "S.L": "24",
                "Name": "Imtiaz Mahmud Oni",
                "ID": "231051012",
                "Batch": "30th",
                "Mobile": "01610976770",
                "T-S": "XL",
                "Dept.": "ENG"
            },
            {
                "S.L": "25",
                "Name": "Nasrin Akter",
                "ID": "193061023",
                "Batch": "20th",
                "Mobile": "01814198389",
                "T-S": "M",
                "Dept.": "LAW"
            },
            {
                "S.L": "26",
                "Name": "Rahatul Islam Rahat",
                "ID": "211061001",
                "Batch": "24th",
                "Mobile": "01886703209",
                "T-S": "XL",
                "Dept.": "LAW"
            },
            {
                "S.L": "27",
                "Name": "Sadia Islam",
                "ID": "212061001",
                "Batch": "25th",
                "Mobile": "01873464660",
                "T-S": "M",
                "Dept.": "LAW"
            },
            {
                "S.L": "28",
                "Name": "Soikat Hossen Sojib",
                "ID": "212061004",
                "Batch": "25th",
                "Mobile": "01813356721",
                "T-S": "M",
                "Dept.": "LAW"
            },
            {
                "S.L": "29",
                "Name": "Rakib Ahmad Miazi",
                "ID": "213061003",
                "Batch": "26th",
                "Mobile": "01973473977",
                "T-S": "XL",
                "Dept.": "LAW"
            },
            {
                "S.L": "30",
                "Name": "Mohammad Sabuj",
                "ID": "231061026",
                "Batch": "30th",
                "Mobile": "01884237206",
                "T-S": "XL",
                "Dept.": "LAW"
            },
            {
                "S.L": "31",
                "Name": "Farchina Akter Nadia",
                "ID": "223031018",
                "Batch": "29th",
                "Mobile": "01859258185",
                "T-S": "",
                "Dept.": "CSE"
            },
            {
                "S.L": "32",
                "Name": "Mahfuzul Karim",
                "ID": "201031009",
                "Batch": "21th",
                "Mobile": "",
                "T-S": "",
                "Dept.": "CSE"
            },
            {
                "S.L": "33",
                "Name": "Kobita Akther",
                "ID": "212061006",
                "Batch": "25th",
                "Mobile": "",
                "T-S": "",
                "Dept.": "LAW"
            }
        ];

        // const data = [{
        //     "S.L": "1",
        //     "Name": "Teacher Delivery System",
        //     "ID": "2342069",
        //     "Batch": "420th",
        //     "Mobile": "01420420420",
        //     "T-S": "XL",
        //     "Dept.": "CSE"
        // }]

        $(document).ready(function() {


            $(data).each(function(i, elm) {
                // let i = 0;

                let batch_intpart = parseInt(data[i]['Batch']);
                let batch_postfix = (data[i]['Batch']).replace(batch_intpart, "");

                let text = [
                    `of the ${batch_intpart}<sup>${batch_postfix}</sup> batch, the Department of ${data[i]['Dept.']}, Feni University is thanked
                        <br/>for his outstanding volunteering contribution to the Maiden Convocation,
                        <br/>held on 23 September 2023, at Feni University as part of the 
                        <br/>Discipline Sub-committee.`
                ];
                var img = `<div id='id_${data[i]['ID']}' class='border' style='page-break-after: always; position:relative; width: 566.67px; width0: calc(1700px / 3); height: 679.67px; height0: calc(2039px / 3);'>
                    <img src='cert.png' style='width: 100%' />
                    <div class='name'>${(data[i]['Name']).toLocaleUpperCase()}</div>
                    <div class='desc'>${text}</div>

                    <div class='watermark'>Developed by TDS</div>
                </div>
                
            `;

                $('.container').append(img);
            });

        });
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
                orientation: "p",
                unit: "pt",
                // format: "letter",
                format: [679.67, 566.67]
            });

            let transcripts = $(".container div.border");

            for (let index = 0; index < transcripts.length; index++) {
                let elm = transcripts[index];
                let id = $(elm).prop("id");
                let stdid = id.replace("#id_", "");
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
            }

            doc.save("32-certificates-for-convocation-decipline-committee.pdf");
        }
    </script>
</body>

</html>