<!DOCTYPE html>
<html>
<head>
    <title>{{ $moduleLkpd->lkpd_title }}</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            line-height: 1.6; 
            color: #333;
            margin: 0 auto;
            max-width: 800px;
            padding: 20px;
        }
        .header { 
            text-align: left; 
            margin-bottom: 20px; 
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }
        .category { color: #00BCD4; font-size: 0.9em; }
        .title { font-size: 1.5em; font-weight: bold; margin-bottom: 10px; }
        .author { color: #666; font-size: 0.9em; }
        .section { 
            margin-bottom: 20px; 
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
        }
        .tags { margin-bottom: 20px; }
        .tag { 
            display: inline-block;
            border: 1px solid black;
            padding: 5px 10px;
            margin-right: 5px;
            margin-bottom: 5px;
            border-radius: 4px;
        }
        .step { 
            margin-bottom: 15px; 
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
        }
        .step-title { font-weight: bold; margin-bottom: 10px; }
        img { 
            max-width: 100%; 
            height: auto; 
            display: block; 
            margin: 15px auto; 
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="category">{{ $moduleLkpd->category->category_name ?? 'Uncategorized' }}</div>
        <div class="title">{{ $moduleLkpd->lkpd_title }}</div>
        <div class="author">
            Dibuat oleh <strong>{{ $moduleLkpd->user->name }}</strong> 
            @if(!empty($collaboratorString))
                berkolaborasi dengan <strong>{{ $collaboratorString }}</strong>
            @endif
        </div>
    </div>

    @if($moduleLkpd->lkpd_image)
        <div>
            <img src="{{ storage_path('app/public/' . $moduleLkpd->lkpd_image) }}" alt="{{ $moduleLkpd->lkpd_title }}">
        </div>
    @endif

    <div class="section">
        <h2>Deskripsi</h2>
        <p>{{ $moduleLkpd->lkpd_description }}</p>
    </div>



    <div class="section">
        <h2>Bahan dan Alat</h2>
        @if($moduleLkpd->material_image)
            <img src="{{ storage_path('app/public/' . $moduleLkpd->material_image) }}" alt="Bahan dan Alat">
        @endif
        <p>{{ $moduleLkpd->material_name }}</p>
    </div>

    <div class="section">
        <h2>Langkah-Langkah</h2>
        @foreach ($moduleLkpd->lkpdSteps as $step)
            <div class="step">
                <div class="step-title">Langkah {{ $step->step_number }}: {{ $step->step_title }}</div>
                @if($step->step_image)
                    <img src="{{ storage_path('app/public/' . $step->step_image) }}" alt="Langkah {{ $step->step_number }}">
                @endif
                <p>{{ $step->step_description }}</p>
            </div>
        @endforeach
    </div>
</body>
</html>