@extends('layouts.app')

@section('content')
@include('partials.estimator')
<div class="page-content estimate-page">
        <div class="container-cal">
            <!-- <div class="header">
                <div class="logo">
                    <img src="https://rangdebasanti.com/newsample1/wp-content/uploads/2025/04/logo-white.jpg" alt="Bhavana Interiors Logo">
                </div>
                <div class="company-info">
                    <h1>BHAVANA INTERIORS & DECORATORS</h1>
                    <p>No.96/5, 1st Floor, Dhruv Palace, Navya Nagar, Jakkur, Bangalore - 560064</p>
                    <p>Website: www.bhavanainteriordecorators.com | Email ID: info@bhavanainteriordecorators.com | Phone: 9902571049</p>
                </div>
            </div> -->

            <div class="client-details">
                <div class="detail-group">
                    <label for="biExecutive">BI Executive *</label>
                    <input type="text" id="biExecutive" placeholder="Enter BI Executive name" required>
                    <div class="pdf-value" id="pdf-biExecutive"></div>
                </div>
                <div class="detail-group">
                    <label for="clientName">Client Name *</label>
                    <input type="text" id="clientName" placeholder="Enter client name" required>
                    <div class="pdf-value" id="pdf-clientName"></div>
                </div>
                <div class="detail-group">
                    <label for="propertyType">Property Type *</label>
                    <select id="propertyType" required>
                        <option value="">Select Property Type</option>
                        <option value="apartment">Apartment</option>
                        <option value="villa">Villa</option>
                        <option value="renovation">Renovation</option>
                        <option value="office">Office</option>
                        <option value="spa_salon">Spa & Salon</option>
                        <option value="cafe_restaurant">Café & Restaurant</option>
                        <option value="commercial">Commercial</option>
                    </select>
                    <div class="pdf-value" id="pdf-propertyType"></div>
                </div>
                <div class="detail-group">
                    <label for="estimateDate">Estimate Date</label>
                    <input type="date" id="estimateDate">
                    <div class="pdf-value" id="pdf-estimateDate"></div>
                </div>
                <div class="detail-group">
                    <label for="expiryDate">Estimate Expiry Date</label>
                    <input type="date" id="expiryDate" readonly>
                    <div class="pdf-value" id="pdf-expiryDate"></div>
                </div>
            </div>

            <div id="propertyOptions" class="property-options">
                <h3>Select Property Type:</h3>
                <div class="property-checkboxes">
                    <div class="property-checkbox">
                        <input type="radio" id="1BHK" name="property" value="1BHK">
                        <label for="1BHK">1BHK</label>
                    </div>
                    <div class="property-checkbox">
                        <input type="radio" id="2BHK" name="property" value="2BHK">
                        <label for="2BHK">2BHK</label>
                    </div>
                    <div class="property-checkbox">
                        <input type="radio" id="3BHK" name="property" value="3BHK">
                        <label for="3BHK">3BHK</label>
                    </div>
                    <div class="property-checkbox">
                        <input type="radio" id="4BHK" name="property" value="4BHK">
                        <label for="4BHK">4BHK</label>
                    </div>
                    <div class="property-checkbox">
                        <input type="radio" id="5BHK" name="property" value="5BHK">
                        <label for="5BHK">5BHK</label>
                    </div>
                </div>
            </div>

            <div id="floorOptions" class="floor-options">
                <h3>Select Floors:</h3>
                <div class="floor-checkboxes">
                    <div class="floor-checkbox">
                        <input type="checkbox" id="groundFloor" value="Ground Floor">
                        <label for="groundFloor">Ground Floor</label>
                    </div>
                    <div class="floor-checkbox">
                        <input type="checkbox" id="firstFloor" value="First Floor">
                        <label for="firstFloor">First Floor</label>
                    </div>
                    <div class="floor-checkbox">
                        <input type="checkbox" id="secondFloor" value="Second Floor">
                        <label for="secondFloor">Second Floor</label>
                    </div>
                    <div class="floor-checkbox">
                        <input type="checkbox" id="thirdFloor" value="Third Floor">
                        <label for="thirdFloor">Third Floor</label>
                    </div>
                    <div class="floor-checkbox">
                        <input type="checkbox" id="fourthFloor" value="Fourth Floor">
                        <label for="fourthFloor">Fourth Floor</label>
                    </div>
                    <div class="floor-checkbox">
                        <input type="checkbox" id="fifthFloor" value="Fifth Floor">
                        <label for="fifthFloor">Fifth Floor</label>
                    </div>
                </div>
            </div>

            <div class="greeting">
                <!-- <p>Greetings from <strong>Bhavana Interiors & Decorators</strong>,</p>
                <p>Thank you for considering Bhavana Interiors & Decorators for your project! We specialize in customized interior solutions using premium, ISI-grade materials and in-house production for unmatched quality. Our expert team delivers tailored designs—from modular kitchens to wardrobes & more—ensuring durability, aesthetics, and precision.</p>
                <p>Below is a detailed estimate reflecting your requirements. Every product is crafted under strict quality control, offering seamless finishes and timeless elegance.</p> -->
                <p>Let's bring your vision to life with perfection. For any modifications or queries, feel free to reach out.</p>
            </div>

            <!-- Summary Section -->
            <div class="summary-section">
                <h2 class="section-title">Summary</h2>
                <table class="summary-table">
                    <thead>
                        <tr>
                            <th>S. No.</th>
                            <th>Area</th>
                            <th>Amount (₹)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="summaryTableBody">
                        <!-- Summary rows will be added here -->
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">Total Price</td>
                            <td id="summaryTotal">0.00</td>
                        </tr>
                        <tr>
                            <td colspan="2">GST (18%)</td>
                            <td id="summaryGst">0.00</td>
                        </tr>
                        <tr>
                            <td colspan="2">Grand Total</td>
                            <td id="summaryGrandTotal">0.00</td>
                        </tr>
                        <tr>
                            <td colspan="2">Discount (%)</td>
                            <td>
                                <input type="number" id="discountPercent" min="0" max="100" value="15" style="width: 60px;">
                                <button onclick="applyDiscount()">Apply</button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Discount Amount</td>
                            <td id="summaryDiscount">0.00</td>
                        </tr>
                        <tr class="summary-total">
                            <td colspan="2">Final Amount</td>
                            <td id="summaryFinalAmount">0.00</td>
                        </tr>
                        <tr>
                            <td colspan="2">You Save</td>
                            <td id="summarySavings">0.00</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <h2 class="section-title">Interior Estimate Calculator</h2>

            <div class="estimate-area">
                <div class="area-selector">
                    <label for="areaSelect">Select Area:</label>
                    <select id="areaSelect">
                        <option value="">-- Select Area --</option>
                        <!-- Options will be populated based on property type -->
                    </select>
                </div>

                <div class="element-grid" id="elementContainer">
                    <!-- Elements will be populated based on area selection -->
                </div>

                <div class="element-details" id="elementDetails">
                    <h3>Element Details</h3>
                    <div class="detail-row">
                        <div>
                            <label for="materialSelect">Material</label>
                            <select id="materialSelect">
                                <option value="">-- Select Material --</option>
                                <option value="material1">Carcass - Plywood MR (19mm) Shutter - HDHMR (19mm)</option>
                                <option value="material2">Carcass - Plywood BWP (19mm) Shutter - HDHMR (19mm)</option>
                                <option value="material3">Carcass - Plywood MR (19mm)</option>
                                <option value="material4">Carcass - Plywood BWP (19mm)</option>
                                <option value="material5">Plywood MR (19mm)</option>
                                <option value="material6">Plywood BWP (19mm)</option>
                                <option value="material7">Carcass - Plywood MR (19mm) Shutter - Lacquered Glass</option>
                                <option value="material8">Carcass - Plywood BWP (19mm) Shutter - Lacquered Glass</option>
                                <option value="material9">Carcass - Plywood MR (19mm) Shutter - Profile Shutter</option>
                                <option value="material10">Carcass - Plywood BWP (19mm) Shutter - Profile Shutter</option>
                                <option value="material11">Plywood MR (12mm)</option>
                                <option value="material12">Plywood BWP (12mm)</option>
                                <option value="material13">Carcass - Plywood MR (12mm) Shutter - HDHMR (12mm)</option>
                                <option value="material14">Carcass - Plywood BWP (12mm) Shutter - HDHMR (12mm)</option>
                                <option value="material15">MDF</option>
                                <option value="material16">HDHMR</option>
                                <option value="material17">Fabric</option>
                                <option value="material18">Toughened Glass</option>
                                <option value="material19">Mirror</option>
                                <option value="material20">Mirror with LED</option>
                                <option value="material21">MS</option>
                                <option value="material22">Wallpaper (Per Roll)</option>
                                <option value="material23">Customised Wallpaper (Per Roll)</option>
                                <option value="material24">Stone</option>
                                <option value="material25">Kitchen Accessories</option>
                                <option value="material26">Wardrobe Accessories</option>
                                <option value="material27">Ceiling</option>
                                <option value="material28">Flooring</option>
                                <option value="material29">Paint</option>
                                <option value="material30">Electric Work</option>
                                <option value="material31">Plumbing</option>
                                <option value="material32">Civil Work</option>
                                <option value="material33">Deep Cleaning</option>
                                <option value="material34">Floor Guard</option>
                                <option value="material35">Transportation</option>
                            </select>
                        </div>
                        <div>
                            <label for="finishSelect">Finish</label>
                            <select id="finishSelect">
                                <option value="">-- Select Finish --</option>
                                <!-- Options will be populated based on material selection -->
                            </select>
                        </div>
                    </div>
                    <div class="detail-row">
                        <div>
                            <label for="unitSelect">Unit</label>
                            <select id="unitSelect">
                                <option value="">-- Select Unit --</option>
                                <option value="sft">SFT</option>
                                <option value="rft">RFT</option>
                                <option value="nos">NOS</option>
                                <option value="lsm">LSM</option>
                            </select>
                        </div>
                        <div>
                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" min="1" value="1">
                        </div>
                    </div>
                    <div class="detail-row">
                        <div>
                            <label for="width">Width (ft)</label>
                            <input type="number" id="width" min="0" step="0.1" placeholder="Width">
                        </div>
                        <div>
                            <label for="height">Height (ft)</label>
                            <input type="number" id="height" min="0" step="0.1" placeholder="Height">
                        </div>
                    </div>
                    <div class="detail-row">
                        <div>
                            <label for="rate">Rate (₹/unit)</label>
                            <input type="text" id="rate" readonly>
                        </div>
                        <div>
                            <label for="amount">Amount (₹)</label>
                            <input type="text" id="amount" readonly>
                        </div>
                    </div>
                    <div class="actions">
                        <button class="btn btn-primary" id="addToEstimate">Add to Estimate</button>
                        <button class="btn btn-danger" id="cancelElement">Cancel</button>
                        </div>
                </div>
            </div>

            <h2 class="section-title">Detailed Woodwork Estimate</h2>

            <table id="estimateTable">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Area</th>
                        <th>Element</th>
                        <th>Material</th>
                        <th>Finish</th>
                        <th>Dimensions</th>
                        <th>Unit</th>
                        <th>Qty</th>
                        <th>Rate (₹)</th>
                        <th>Amount (₹)</th>
                        <th>Actions</th>
                </thead>
                <tbody>
                    <!-- Estimate items will be added here -->
                </tbody>
            </table>

            <div class="export-actions">
                <button class="export-btn pdf-btn" id="exportPdf">
                    <span>Export as PDF</span>
                </button>
                <button class="export-btn excel-btn" id="exportExcel">
                    <span>Export as Excel</span>
                </button>
                <button class="export-btn whatsapp-btn" id="shareWhatsapp">
                    <span>Share on WhatsApp</span>
                </button>
                <button class="export-btn save-estimate-btn" id="saveEstimate">
                    <span>Save Estimate</span>
                </button>
            </div>

            <div id="lastSavedBid" style="margin-top:12px;color:green;font-weight:600;"></div>

            <meta name="csrf-token" content="{{ csrf_token() }}">

            <footer>
                <p>© 2023 Bhavana Interiors & Decorators. All rights reserved.</p>
            </footer>
        </div>

    <!-- Hidden container for PDF export (hidden by default to avoid duplicate visible summary) -->
    <style>
        /* PDF export styling: A4-like width, margins, fonts and page-break hints */
        #pdfExportContainer {
            display: none; /* still hidden in UI until export */
            background: #fff;
            color: #222;
            font-family: Arial, Helvetica, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        /* A4 @ 96dpi ~ 794px width; apply padding (20mm) to create printable margins */
        #pdfExportContainer .pdf-page {
            width: 794px;
            min-height: 1123px; /* A4 height at 96dpi */
            /* increase bottom padding to create larger gap before footer */
            padding: 20mm 20mm 45mm 20mm; /* top right bottom left */
            box-sizing: border-box;
            background: #fff;
            position: relative;
        }

        #pdfExportContainer .header .logo img {
            max-width: 120px;
            height: auto;
            display: block;
        }

        /* Watermark - centered and subtle */
        #pdfExportContainer .pdf-watermark img {
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.06;
            max-width: 60%;
            height: auto;
            pointer-events: none;
        }

        /* Tables and text sizing for print */
        #pdfExportContainer table { width: 100%; border-collapse: collapse; font-size: 12px; }
        #pdfExportContainer table th, #pdfExportContainer table td { padding: 6px 8px; border: 1px solid #e6e6e6; vertical-align: top; }
        #pdfExportContainer .company-info h1 { font-size: 16px; margin: 0 0 4px 0; }
        #pdfExportContainer .detail-group { margin-bottom: 6px; }

        /* Prevent breaking inside important rows/sections where possible */
        #pdfExportContainer .area-header, #pdfExportContainer tbody tr { page-break-inside: avoid; break-inside: avoid; }

        /* Try to keep the Summary section together and avoid splitting its rows across pages */
        #pdfExportContainer .summary-section, #pdfExportContainer .summary-table, #pdfExportContainer .summary-table thead, #pdfExportContainer .summary-table tbody, #pdfExportContainer .summary-table tfoot {
            page-break-inside: avoid;
            break-inside: avoid;
        }
        #pdfExportContainer .summary-table thead { display: table-header-group; }
        #pdfExportContainer .summary-table tfoot { display: table-footer-group; }

        /* Footer styling */
        #pdfExportContainer .pdf-footer {
            margin-top: 28px;
            padding: 14px 8px 8px 8px;
            border-top: 1px solid #e6e6e6;
            font-size: 11px;
            color: #333;
            clear: both;
            background: #fff; /* ensure footer text is on white background */
            box-shadow: 0 -1px 0 rgba(0,0,0,0.02) inset;
        }
    </style>

    <div id="pdfExportContainer" class="pdf-export-container">
        <div class="pdf-page">
            <div class="pdf-watermark">
                <img src="https://rangdebasanti.com/newsample1/wp-content/uploads/2025/04/logo-white.jpg" alt="Watermark">
            </div>

            <div class="header">
                <div class="logo">
                    <img src="https://rangdebasanti.com/newsample1/wp-content/uploads/2025/04/logo-white.jpg" alt="Bhavana Interiors Logo">
                </div>
                <div class="company-info">
                    <h1>BHAVANA INTERIORS & DECORATORS</h1>
                    <p>No.96/5, 1st Floor, Dhruv Palace, Navya Nagar, Jakkur, Bangalore - 560064</p>
                    <p>Website: www.bhavanainteriordecorators.com | Email ID: info@bhavanainteriordecorators.com | Phone: 9902571049</p>
                </div>
            </div>

            <div class="client-details">
                <div class="detail-group">
                    <label>BI Executive</label>
                    <div id="pdf-biExecutive" style="color: #000;"></div>
                </div>
                <div class="detail-group">
                    <label>Client Name</label>
                    <div id="pdf-clientName" style="color: #000;"></div>
                </div>
                <div class="detail-group">
                    <label>Property Type</label>
                    <div id="pdf-propertyType" style="color: #000;"></div>
                </div>
                <div class="detail-group">
                    <label>Estimate Date</label>
                    <div id="pdf-estimateDate" style="color: #000;"></div>
                </div>
                <div class="detail-group">
                    <label>Estimate Expiry Date</label>
                    <div id="pdf-expiryDate" style="color: #000;"></div>
                </div>
            </div>

            <div class="greeting" style="margin-bottom: 250px;">
                <p>Greetings from <strong>Bhavana Interiors & Decorators</strong>,</p>
                <p>Thank you for considering Bhavana Interiors & Decorators for your project! We specialize in customized interior solutions using premium, ISI-grade materials and in-house production for unmatched quality. Our expert team delivers tailored designs—from modular kitchens to wardrobes & more—ensuring durability, aesthetics, and precision.</p>
                <p>Below is a detailed estimate reflecting your requirements. Every product is crafted under strict quality control, offering seamless finishes and timeless elegance.</p>
                <p>Let's bring your vision to life with perfection. For any modifications or queries, feel free to reach out.</p>
            </div>

            <!-- Summary Section -->
            <div class="summary-section">
                <h2 class="section-title">Summary</h2>
                <table class="summary-table">
                    <thead>
                        <tr>
                            <th>S. No.</th>
                            <th>Area</th>
                            <th>Amount (₹)</th>
                        </tr>
                    </thead>
                    <tbody id="pdf-summaryTableBody">
                        <!-- Summary rows will be added here -->
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">Total Price</td>
                            <td id="pdf-summaryTotal">0.00</td>
                        </tr>
                        <tr>
                            <td colspan="2">GST (18%)</td>
                            <td id="pdf-summaryGst">0.00</td>
                        </tr>
                        <tr>
                            <td colspan="2">Grand Total</td>
                            <td id="pdf-summaryGrandTotal">0.00</td>
                        </tr>
                        <tr>
                            <td colspan="2">Discount (<span id="pdf-discountPercent">15</span>%)</td>
                            <td id="pdf-summaryDiscount">0.00</td>
                        </tr>
                        <tr class="summary-total">
                            <td colspan="2">Final Amount</td>
                            <td id="pdf-summaryFinalAmount">0.00</td>
                        </tr>
                        <tr>
                            <td colspan="2">You Save</td>
                            <td id="pdf-summarySavings">0.00</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <h2 class="section-title">Detailed Woodwork Estimate</h2>

            <table id="pdf-estimateTable">
                <thead>
                    <tr>
                        <th>Area</th>
                        <th>Element</th>
                        <th>Material</th>
                        <th>Finish</th>
                        <th>Dimensions</th>
                        <th>Unit</th>
                        <th>Qty</th>
                        <th>Rate (₹)</th>
                        <th>Amount (₹)</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Estimate items will be added here -->
                </tbody>
            </table>

            <div class="pdf-footer">
                <!-- Footer content will be added here via JavaScript -->
            </div>
        </div>

        <script src="/js/estimate-tool.js"></script>
</div>
@endsection