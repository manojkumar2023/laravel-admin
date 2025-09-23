<link rel="icon" type="image/x-icon" href="https://rangdebasanti.com/newsample1/wp-content/uploads/2025/04/logo-white.jpg">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<style>

    .watermark {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0.05;
        z-index: -1;
        pointer-events: none;
    }

    .watermark img {
        width: 250px;
        height: 250px;
    }

    .container-cal {
        /* max-width: 1200px; */
        margin: 0 auto;
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid #e9ecef;
    }

    .logo img {
        width: 100px;
        height: 100px;
        object-fit: contain;
    }

    .company-info {
        text-align: center;
        flex-grow: 1;
    }

    .company-info h1 {
        color: #2c3e50;
        margin-bottom: 5px;
        font-size: 28px;
    }

    .company-info p {
        color: #7f8c8d;
        margin-bottom: 3px;
        font-size: 14px;
    }

    .client-details {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
    }

    .detail-group {
        display: flex;
        flex-direction: column;
    }

    .detail-group label {
        font-weight: 600;
        margin-bottom: 5px;
        color: #2c3e50;
    }

    .detail-group input,
    .detail-group select {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
    }

    .property-options,
    .floor-options {
        display: none;
        margin-top: 15px;
        padding: 15px;
        background: #e8f4fc;
        border-radius: 8px;
    }

    .property-checkboxes,
    .floor-checkboxes {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 10px;
    }

    .property-checkbox,
    .floor-checkbox {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .greeting {
        background: #e8f4fc;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 30px;
        line-height: 1.8;
        color: #2c3e50;
    }

    .summary-section {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 30px;
    }

    .summary-table {
        width: 100%;
        border-collapse: collapse;
        margin: 15px 0;
    }

    .summary-table th,
    .summary-table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .summary-table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .summary-total {
        font-weight: bold;
        font-size: 1.2em;
        color: #2c3e50;
        border-top: 2px solid #2c3e50;
    }

    .section-title {
        background: #2c3e50;
        color: white;
        padding: 12px 20px;
        border-radius: 5px;
        margin: 25px 0 15px;
        font-size: 20px;
    }

    .estimate-area {
        margin-bottom: 20px;
    }

    .area-selector {
        margin-bottom: 15px;
    }

    .area-selector select {
        padding: 10px;
        width: 100%;
        border-radius: 5px;
        border: 1px solid #ddd;
        font-size: 16px;
    }

    .element-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 15px;
        margin-bottom: 20px;
    }

    .element-item {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
        border: 1px solid #e9ecef;
        cursor: pointer;
        transition: all 0.3s;
        text-align: center;
    }

    .element-item:hover {
        background: #e8f4fc;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .element-item.selected {
        background: #d4edda;
        border-color: #c3e6cb;
    }

    .element-details {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        display: none;
    }

    .detail-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        margin-bottom: 15px;
    }

    .detail-row div {
        display: flex;
        flex-direction: column;
    }

    .detail-row label {
        font-weight: 600;
        margin-bottom: 5px;
        color: #2c3e50;
    }

    .detail-row input,
    .detail-row select {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 15px;
    }

    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-primary {
        background: #007bff;
        color: white;
    }

    .btn-primary:hover {
        background: #0069d9;
    }

    .btn-success {
        background: #28a745;
        color: white;
    }

    .btn-success:hover {
        background: #218838;
    }

    .btn-danger {
        background: #dc3545;
        color: white;
    }

    .btn-danger:hover {
        background: #c82333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    th,
    td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .area-header {
        background-color: #2c3e50 !important;
        color: white !important;
        font-weight: bold;
        font-size: 16px;
    }

    .floor-header {
        background-color: #34495e !important;
        color: white !important;
        font-weight: bold;
        font-size: 18px;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    .summary {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        margin-top: 30px;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #e9ecef;
    }

    .export-actions {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin: 30px 0;
    }

    .export-btn {
        padding: 12px 25px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .pdf-btn {
        background: #e74c3c;
        color: white;
    }

    .excel-btn {
        background: #27ae60;
        color: white;
    }

    .whatsapp-btn {
        background: #25D366;
        color: white;
    }

    footer {
        margin-top: 50px;
        padding-top: 20px;
        border-top: 1px solid #ddd;
        font-size: 14px;
        color: #7f8c8d;
    }

    .discount-section {
        margin-top: 20px;
        padding: 15px;
        background: #e8f4fc;
        border-radius: 8px;
    }

    /* PDF Export Container Styles */
    .pdf-export-container {
        position: absolute;
        left: -9999px;
        top: -9999px;
        width: 794px;
        /* A4 width in pixels at 96dpi */
        background: white;
        padding: 40px 30px;
        color: #59585d;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .pdf-export-container .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid #faad45;
    }

    .pdf-export-container .logo img {
        width: 100px;
        height: 100px;
        object-fit: contain;
    }

    .pdf-export-container .company-info {
        text-align: center;
        flex-grow: 1;
    }

    .pdf-export-container .company-info h1 {
        color: #faad45;
        margin-bottom: 5px;
        font-size: 28px;
    }

    .pdf-export-container .client-details .detail-group div {
        padding: 8px;
        background: white;
        border: 1px solid #ddd;
        border-radius: 5px;
        min-height: 20px;
        color: #59585d;
    }

    .pdf-export-container .section-title {
        background: #faad45;
        color: white;
        padding: 12px 20px;
        border-radius: 5px;
        margin: 25px 0 15px;
        font-size: 20px;
    }

    .pdf-export-container table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        color: #59585d;
    }

    .pdf-export-container th,
    .pdf-export-container td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .pdf-export-container th {
        background-color: #faad45;
        color: white;
        font-weight: bold;
    }

    .pdf-export-container .area-header {
        background-color: #faad45 !important;
        color: white !important;
        font-weight: bold;
        font-size: 16px;
    }

    .pdf-export-container .summary-table th {
        background-color: #faad45;
        color: white;
    }

    .pdf-export-container .summary-total {
        font-weight: bold;
        font-size: 1.2em;
        color: #59585d;
        border-top: 2px solid #faad45;
    }

    .pdf-watermark {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0.05;
        z-index: -1;
        pointer-events: none;
    }

    .pdf-watermark img {
        width: 300px;
        height: 300px;
    }

    /* Hide elements that shouldn't be in PDF */
    .pdf-export-container .client-details .detail-group input,
    .pdf-export-container .client-details .detail-group select,
    .pdf-export-container .area-selector select,
    .pdf-export-container .element-grid,
    .pdf-export-container .element-details,
    .pdf-export-container .floor-options,
    .pdf-export-container .property-options,
    .pdf-export-container .export-actions,
    .pdf-export-container footer,
    .pdf-export-container .estimate-area,
    .pdf-export-container .btn-edit,
    .pdf-export-container .btn-delete {
        display: none !important;
    }

    /* Print styles for better PDF output */
    @media print {
        body * {
            visibility: hidden;
        }

        .container,
        .container * {
            visibility: visible;
        }

        .container {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            padding: 15px;
            box-shadow: none;
        }
    }
</style>