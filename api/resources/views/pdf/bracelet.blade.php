<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>LomoHealth - {{ $child->name }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; margin: 20px; background: #f0f8ea; }
        .card { width: 350px; height: 550px; border: 4px solid #006600; border-radius: 20px; padding: 20px; background: white; margin: auto; position: relative; }
        .header { background: #006600; color: white; padding: 10px; text-align: center; border-radius: 15px 15px 0 0; margin: -20px -20px 20px -20px; }
        .flag { height: 30px; }
        .photo { width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 4px solid #006600; margin: 10px auto; display: block; }
        .qr { text-align: center; margin: 20px 0; }
        .info { text-align: center; font-size: 14px; }
        .footer { position: absolute; bottom: 20px; left: 0; right: 0; text-align: center; font-size: 12px; color: #006600; }
    </style>
</head>
<body>
<div class="card">
    <div class="header">
        <h2>LOMOHEALTH TOGO</h2>
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/68/Flag_of_Togo.svg" class="flag">
    </div>
    <h3 style="text-align:center; color:#006600">Carnet de Santé Numérique</h3>
    
    @if($child->photo)
        <img src="{{ storage_path('app/public/photos/'.$child->photo) }}" class="photo">
    @else
        <div class="photo" style="background:#eee"></div>
    @endif

    <div class="info">
        <p><strong>Nom :</strong> {{ $child->name }}</p>
        <p><strong>Né(e) le :</strong> {{ $child->birth_date->format('d/m/Y') }}</p>
        <p><strong>Téléphone mère :</strong> {{ $child->mother_phone }}</p>
        <p><strong>Code unique :</strong> {{ $child->qr_code }}</p>
    </div>

    <div class="qr">
        {!! $qrImage !!}
    </div>

    <div class="footer">
        Ministère de la Santé Togo • UNICEF • 2025<br>
        Scan = historique complet
    </div>
</div>
</body>
</html>