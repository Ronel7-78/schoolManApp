<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Reçu de Paiement</title>
    <style>
        @page {
            size: A4;
            margin: 0;
        }
        body {
            margin: 2cm;
            font-family: Arial, sans-serif;
            line-height: 1.5;
        }
        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 2cm;
        }
        .header-left, .header-right {
            width: 30%;
        }
        .header-center {
            width: 30%;
            text-align: center;
        }
        .logo {
            width: 100px;
            height: auto;
        }
        .title {
            text-align: center;
            font-size: 24px;
            margin: 2cm 0;
            text-transform: uppercase;
        }
        .content {
            display: flex;
            justify-content: space-between;
            margin-bottom: 2cm;
        }
        .student-info {
            width: 60%;
        }
        .payment-table {
            width: 35%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        .amount-due {
            color: black;
        }
        .amount-paid {
            color: green;
        }
        .amount-remaining {
            color: red;
        }
        .footer {
            display: flex;
            justify-content: space-between;
            margin-top: 3cm;
        }
        .text-center {
            text-align: center;
        }
        .text-italic {
            font-style: italic;
        }
        @media print {
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-left">
            <p>République du Cameroun</p>
            <p class="text-italic">Paix-Travail-Patrie</p>
            <p>Ministère de l'enseignement Secondaire</p>
            <p>Lycée de MOKOLO IV Bertoua</p>
        </div>
        <div class="header-center">
            <img src="{{ asset('imagesP/logo.png') }}" alt="Logo" class="logo">
        </div>
        <div class="header-right">
            <p>Republic of Cameroon</p>
            <p class="text-italic">Peace-Work-Fatherland</p>
            <p>Ministry of Secondary Education</p>
            <p>Govement High School MOKOLO IV Bertoua</p>
        </div>
    </div>

    <div class="title">
        Reçu de Paiement
    </div>

    <div class="content">
        <div class="student-info">
            <p><strong>Nom(s) & Prénom(s) :</strong> {{$students->nomEl}}  {{$students->prenomEl}} </p>
            <p><strong>Né(e) le :</strong>  {{$students->dateNais}}  <strong>À</strong> {{$students->lieuNais}}</p>
            <p><strong>Classe :</strong> {{$students->codeCl}} <strong>Sexe :</strong> {{$students->gender}}</p>
        </div>
        <div class="payment-table">
            <table>
                <thead>
                    <tr>
                        <th>Montant Due</th>
                        <th>Montant versé</th>
                        <th>Reste</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="amount-due">{{ $students->montantDue }} F CFA<</td>
                        <td class="amount-paid">{{ $students->montantVerse }} F CFA</td>
                        <td class="amount-remaining">{{ $students->resteV }} F CFA</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer">
        <div class="signature">
            <p><strong>L'Intendant(e)</strong></p>
            <p>_________________</p>
        </div>
        <div class="date">
            <p><strong>Fait le :</strong> {{$students->datePay}}</p>
        </div>
    </div>
</body>
</html>