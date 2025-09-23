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
                    </tr>
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
            </div>

            <footer>
                <p>© 2023 Bhavana Interiors & Decorators. All rights reserved.</p>
            </footer>
        </div>

        <!-- Hidden container for PDF export -->
        <div id="pdfExportContainer" class="pdf-export-container">
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
                    <div id="pdf-biExecutive"></div>
                </div>
                <div class="detail-group">
                    <label>Client Name</label>
                    <div id="pdf-clientName"></div>
                </div>
                <div class="detail-group">
                    <label>Property Type</label>
                    <div id="pdf-propertyType"></div>
                </div>
                <div class="detail-group">
                    <label>Estimate Date</label>
                    <div id="pdf-estimateDate"></div>
                </div>
                <div class="detail-group">
                    <label>Estimate Expiry Date</label>
                    <div id="pdf-expiryDate"></div>
                </div>
            </div>

            <div class="greeting">
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

        <script>
            // Initialize current date and expiry date
            document.addEventListener('DOMContentLoaded', function() {
                const today = new Date();
                const expiryDate = new Date();
                expiryDate.setDate(today.getDate() + 10);

                document.getElementById('estimateDate').valueAsDate = today;
                document.getElementById('expiryDate').valueAsDate = expiryDate;

                // Set up property type change event
                document.getElementById('propertyType').addEventListener('change', function() {
                    const propertyOptions = document.getElementById('propertyOptions');
                    const floorOptions = document.getElementById('floorOptions');
                    const areaSelect = document.getElementById('areaSelect');

                    if (this.value === 'apartment') {
                        propertyOptions.style.display = 'block';
                        floorOptions.style.display = 'none';
                        updateAreaOptions('residential');
                    } else if (this.value === 'villa') {
                        propertyOptions.style.display = 'none';
                        floorOptions.style.display = 'block';
                        updateAreaOptions('residential');
                    } else if (this.value === 'office') {
                        propertyOptions.style.display = 'none';
                        floorOptions.style.display = 'none';
                        updateAreaOptions('office');
                    } else if (this.value === 'spa_salon') {
                        propertyOptions.style.display = 'none';
                        floorOptions.style.display = 'none';
                        updateAreaOptions('spa_salon');
                    } else if (this.value === 'cafe_restaurant') {
                        propertyOptions.style.display = 'none';
                        floorOptions.style.display = 'none';
                        updateAreaOptions('cafe_restaurant');
                    } else if (this.value === 'commercial') {
                        propertyOptions.style.display = 'none';
                        floorOptions.style.display = 'none';
                        updateAreaOptions('commercial');
                    } else {
                        propertyOptions.style.display = 'none';
                        floorOptions.style.display = 'none';
                        updateAreaOptions('residential'); // Default to residential for other types
                    }

                    updatePdfValues();
                });

                // Set up property selection event
                document.querySelectorAll('input[name="property"]').forEach(radio => {
                    radio.addEventListener('change', updatePdfValues);
                });

                // Set up floor selection event
                document.querySelectorAll('.floor-checkbox input[type="checkbox"]').forEach(checkbox => {
                    checkbox.addEventListener('change', updatePdfValues);
                });

                // Set up area selection event
                document.getElementById('areaSelect').addEventListener('change', updateElements);

                // Set up material selection event to update finishes
                document.getElementById('materialSelect').addEventListener('change', updateFinishes);

                // Set up calculate event
                document.getElementById('width').addEventListener('input', calculateAmount);
                document.getElementById('height').addEventListener('input', calculateAmount);
                document.getElementById('quantity').addEventListener('input', calculateAmount);
                document.getElementById('materialSelect').addEventListener('change', calculateRate);
                document.getElementById('finishSelect').addEventListener('change', calculateRate);
                document.getElementById('unitSelect').addEventListener('change', calculateAmount);

                // Set up add to estimate event
                document.getElementById('addToEstimate').addEventListener('click', addToEstimate);

                // Set up cancel event
                document.getElementById('cancelElement').addEventListener('click', cancelElement);

                // Set up export events
                document.getElementById('exportPdf').addEventListener('click', exportPdf);
                document.getElementById('exportExcel').addEventListener('click', exportExcel);
                document.getElementById('shareWhatsapp').addEventListener('click', shareWhatsapp);

                // Set up input events to update PDF values
                document.getElementById('biExecutive').addEventListener('input', updatePdfValues);
                document.getElementById('clientName').addEventListener('input', updatePdfValues);
                document.getElementById('propertyType').addEventListener('change', updatePdfValues);
                document.getElementById('estimateDate').addEventListener('change', updatePdfValues);

                // Initialize PDF values
                updatePdfValues();

                // Adjust page vertical alignment to match sidebar top (page-local, robust)
                function adjustEstimatePageAlignment() {
                    try {
                        const page = document.querySelector('.estimate-page') || document.querySelector('.page-content');
                        const sidebar = document.querySelector('.page-sidebar') || document.querySelector('.sidebar') || document.querySelector('.page-sidebar-wrapper') || document.querySelector('[id*="sidebar"]') || document.querySelector('.page-sidebar-menu');
                        if (!page || !sidebar) return;

                        const pRect = page.getBoundingClientRect();
                        const sRect = sidebar.getBoundingClientRect();

                        // compute delta to move page so its top aligns with sidebar top (viewport relative)
                        const delta = Math.round(sRect.top - pRect.top);

                        // Use transform to shift the page (less likely to trigger layout shifts)
                        page.style.willChange = 'transform';
                        page.style.transform = `translateY(${delta}px)`;
                    } catch (e) {
                        console.warn('adjustEstimatePageAlignment failed', e);
                    }
                }

                // Run adjustment several times to allow late layout (images, scripts) to settle
                (function runAdjustWithRetries() {
                    let attempts = 0;
                    const maxAttempts = 6;
                    const retry = () => {
                        adjustEstimatePageAlignment();
                        attempts++;
                        if (attempts < maxAttempts) {
                            setTimeout(retry, 150);
                        }
                    };
                    // first execution
                    retry();
                    window.addEventListener('resize', adjustEstimatePageAlignment);
                    window.addEventListener('load', adjustEstimatePageAlignment);
                })();
            });

            // Update area options based on property type
            function updateAreaOptions(propertyType) {
                const areaSelect = document.getElementById('areaSelect');
                areaSelect.innerHTML = '<option value="">-- Select Area --</option>';

                if (propertyType === 'residential') {
                    const residentialAreas = [
                        'foyer', 'living', 'dining', 'utility', 'kitchen', 'masterBedroom',
                        'kidsBedroom', 'guestBedroom', 'bedroom1', 'bedroom2', 'bedroom3',
                        'bedroom4', 'bedroom5', 'masterWashroom', 'commonWashroom',
                        'washroom1', 'washroom2', 'balcony', 'studyRoom', 'homeTheatre',
                        'officeRoom', 'entertainmentRoom', 'bookshelf', 'civilWork'
                    ];

                    residentialAreas.forEach(area => {
                        const option = document.createElement('option');
                        option.value = area;
                        option.textContent = areaDisplayNames[area] || area;
                        areaSelect.appendChild(option);
                    });
                } else if (propertyType === 'office' || propertyType === 'commercial') {
                    const officeAreas = [
                        'reception', 'waitingArea', 'workingSpace', 'mdCabin', 'cabin1',
                        'cabin2', 'cabin3', 'cabin4', 'cabin5', 'conferenceRoom', 'pantry',
                        'storage', 'washroom1', 'washroom2', 'avRoom', 'serverRoom',
                        'supervisorCabin', 'ceoCabin', 'trainingRoom', 'executiveCabin'
                    ];

                    officeAreas.forEach(area => {
                        const option = document.createElement('option');
                        option.value = area;
                        option.textContent = areaDisplayNames[area] || area;
                        areaSelect.appendChild(option);
                    });
                } else if (propertyType === 'spa_salon') {
                    const spaSalonAreas = [
                        'reception', 'waitingArea', 'hairCutSection', 'hairWash', 'hairSpa',
                        'facialRoom', 'pedicure', 'manicure', 'pantry', 'cabin1', 'cabin2',
                        'cabin3', 'nailArt'
                    ];

                    spaSalonAreas.forEach(area => {
                        const option = document.createElement('option');
                        option.value = area;
                        option.textContent = areaDisplayNames[area] || area;
                        areaSelect.appendChild(option);
                    });
                } else if (propertyType === 'cafe_restaurant') {
                    const cafeRestaurantAreas = [
                        'reception', 'waitingArea', 'diningSpace', 'seatingSpace', 'kitchen', 'pantryRoom'
                    ];

                    cafeRestaurantAreas.forEach(area => {
                        const option = document.createElement('option');
                        option.value = area;
                        option.textContent = areaDisplayNames[area] || area;
                        areaSelect.appendChild(option);
                    });
                }
            }

            // Update PDF values when inputs change
            function updatePdfValues() {
                document.getElementById('pdf-biExecutive').textContent = document.getElementById('biExecutive').value;
                document.getElementById('pdf-clientName').textContent = document.getElementById('clientName').value;

                const propertyTypeSelect = document.getElementById('propertyType');
                const propertyTypeText = propertyTypeSelect.options[propertyTypeSelect.selectedIndex].text;
                document.getElementById('pdf-propertyType').textContent = propertyTypeText;

                document.getElementById('pdf-estimateDate').textContent = document.getElementById('estimateDate').value;
                document.getElementById('pdf-expiryDate').textContent = document.getElementById('expiryDate').value;

                // Update property/floor selection in PDF
                const propertyType = document.getElementById('propertyType').value;
                let selectionText = '';

                if (propertyType === 'apartment') {
                    const selectedProperty = document.querySelector('input[name="property"]:checked');
                    if (selectedProperty) {
                        selectionText = selectedProperty.value;
                    }
                } else if (propertyType === 'villa') {
                    const selectedFloors = Array.from(document.querySelectorAll('.floor-checkbox input[type="checkbox"]:checked'))
                        .map(cb => cb.value);
                    if (selectedFloors.length > 0) {
                        selectionText = selectedFloors.join(', ');
                    }
                }

                if (selectionText) {
                    document.getElementById('pdf-propertyType').textContent += ` - ${selectionText}`;
                }
            }

            // Define elements for each area (updated as per requirements)
            const areaElements = {
                // Residential areas
                foyer: ["Shoe Rack", "Cushion", "Console Table", "Wall Panelling", "Wall Partition", "Wallpaper", "Door Jamb", "Counter Top", "Wall Beading"],
                living: ["TV Bottom Unit", "TV Tall Unit", "TV Wall Panelling", "Wall Panelling", "Swing", "Wall Partition", "Pooja Unit", "Profile Shutter", "Wallpaper", "Center Table", "Ledge", "Door Jamb", "Counter Top", "Wall Beading"],
                dining: ["Crockery Unit", "Wall Panelling", "Hand Wash Unit", "Wall Partition", "Pooja Unit", "Profile Shutter", "Wallpaper", "Ledge", "Door Jamb", "Counter Top", "Wall Beading"],
                kitchen: ["Bottom Unit", "Overhead Unit", "Loft", "Tall Unit", "Pantry Unit", "OTG Unit", "Spice Rack", "Rolling Shutter Unit", "Profile Shutter", "Ledge", "Door Jamb", "Counter Top", "Wall Beading"],
                utility: ["Bottom Unit", "Overhead Unit", "Loft", "Janitor Unit", "Ledge", "Counter Top", "Wall Beading"],
                masterWashroom: ["Vanity Unit", "Mirror", "Mirror with Storage", "Mirror with LED", "Overhead Unit", "Glass Partition", "Ledge", "Counter Top"],
                commonWashroom: ["Vanity Unit", "Mirror", "Mirror with Storage", "Mirror with LED", "Overhead Unit", "Glass Partition", "Ledge", "Counter Top"],
                washroom1: ["Vanity Unit", "Mirror", "Mirror with Storage", "Mirror with LED", "Overhead Unit", "Glass Partition", "Ledge", "Counter Top"],
                washroom2: ["Vanity Unit", "Mirror", "Mirror with Storage", "Mirror with LED", "Overhead Unit", "Glass Partition", "Ledge", "Counter Top"],
                masterBedroom: ["Cot", "Headboard", "Side Table", "Wall Panelling", "Wallpaper", "Wardrobe", "Loft", "Profile Shutter", "Study Table", "Overhead for Study", "Dressing Unit", "Mirror with LED", "Mirror", "TV Bottom Unit", "TV Tall Unit", "TV Wall Panelling", "Swing", "Center Table", "Ledge", "Door Jamb", "Book Shelf", "Wall Beading", "Bay Window Seating"],
                kidsBedroom: ["Cot", "Headboard", "Side Table", "Wall Panelling", "Wallpaper", "Wardrobe", "Loft", "Profile Shutter", "Study Table", "Overhead for Study", "Dressing Unit", "Mirror with LED", "Mirror", "TV bottom unit", "TV Tall Unit", "TV Wall Panelling", "Ledge", "Door Jamb", "Book Shelf", "Wall Beading", "Bay Window Seating"],
                guestBedroom: ["Cot", "Headboard", "Side Table", "Wall Panelling", "Wallpaper", "Wardrobe", "Loft", "Profile Shutter", "Study Table", "Overhead for Study", "Dressing Unit", "Mirror with LED", "Mirror", "TV Bottom Unit", "TV Tall Unit", "TV Wall Panelling", "Swing", "Center Table", "Ledge", "Door Jamb", "Book Shelf", "Wall Beading", "Bay Window Seating"],
                bedroom1: ["Cot", "Headboard", "Side Table", "Wall Panelling", "Wallpaper", "Wardrobe", "Loft", "Profile Shutter", "Study Table", "Overhead for Study", "Dressing Unit", "Mirror with LED", "Mirror", "TV Bottom Unit", "TV Tall Unit", "TV Wall Panelling", "Swing", "Center Table", "Ledge", "Door Jamb", "Book Shelf", "Wall Beading", "Bay Window Seating"],
                bedroom2: ["Cot", "Headboard", "Side Table", "Wall Panelling", "Wallpaper", "Wardrobe", "Loft", "Profile Shutter", "Study Table", "Overhead for Study", "Dressing Unit", "Mirror with LED", "Mirror", "TV Bottom Unit", "TV Tall Unit", "TV Wall Panelling", "Swing", "Center Table", "Ledge", "Door Jamb", "Book Shelf", "Wall Beading", "Bay Window Seating"],
                bedroom3: ["Cot", "Headboard", "Side Table", "Wall Panelling", "Wallpaper", "Wardrobe", "Loft", "Profile Shutter", "Study Table", "Overhead for Study", "Dressing Unit", "Mirror with LED", "Mirror", "TV Bottom Unit", "TV Tall Unit", "TV Wall Panelling", "Swing", "Center Table", "Ledge", "Door Jamb", "Book Shelf", "Wall Beading", "Bay Window Seating"],
                bedroom4: ["Cot", "Headboard", "Side Table", "Wall Panelling", "Wallpaper", "Wardrobe", "Loft", "Profile Shutter", "Study Table", "Overhead for Study", "Dressing Unit", "Mirror with LED", "Mirror", "TV Bottom Unit", "TV Tall Unit", "TV Wall Panelling", "Swing", "Center Table", "Ledge", "Door Jamb", "Book Shelf", "Wall Beading", "Bay Window Seating"],
                bedroom5: ["Cot", "Headboard", "Side Table", "Wall Panelling", "Wallpaper", "Wardrobe", "Loft", "Profile Shutter", "Study Table", "Overhead for Study", "Dressing Unit", "Mirror with LED", "Mirror", "TV Bottom Unit", "TV Tall Unit", "TV Wall Panelling", "Swing", "Center Table", "Ledge", "Door Jamb", "Book Shelf", "Wall Beading", "Bay Window Seating"],
                balcony: ["Janitor Unit", "Storage Unit", "Wall Panelling", "Ledge", "Counter Top"],
                pantry: ["Bottom Unit", "Overhead Unit", "Loft", "Tall Unit", "Ledge", "Profile Shutter", "Door Jamb", "Counter Top", "Wall Beading"],
                studyRoom: ["Study Table", "Bookshelf", "Wall Panelling", "Wallpaper", "Ledge", "Door Jamb", "Wall Beading"],
                homeTheatre: ["TV Wall Unit", "Wall Panelling", "Acoustic Panels", "Seating", "Ledge", "Wall Beading"],
                officeRoom: ["Workstation", "Storage Units", "Wall Panelling", "Bookshelf", "Ledge", "Door Jamb", "Wall Beading"],
                entertainmentRoom: ["Bar Unit", "Entertainment Unit", "Wall Panelling", "Seating", "Ledge", "Wall Beading"],
                bookshelf: ["Book Shelf"],
                civilWork: ["Ceiling", "Flooring", "Paint", "Electric Work", "Plumbing", "Civil Work", "Deep Cleaning", "Floor Guard", "Transportation"],

                // Office areas
                reception: ["Reception Table", "Wall Panelling", "Display Unit", "Chair", "Table", "Wall Partition", "Wall Beading", "Wallpaper", "Door Jamb", "Locker"],
                waitingArea: ["Chair", "Table", "Wall Partition", "Wall Panelling", "Wall Beading", "Wallpaper", "Door Jamb", "Display Unit", "Loose Furniture", "Locker"],
                workingSpace: ["Workstation", "Wall Panelling", "Wall Partition", "Wallpaper", "Wall Beading", "Door Jamb", "Table", "Chair", "Storage Unit", "Locker"],
                mdCabin: ["Table", "Chair", "Storage Unit", "Display Unit", "Wall Panelling", "Wallpaper", "Wall Beading", "TV Bottom Unit", "TV Wall Panelling"],
                cabin1: ["Table", "Chair", "Storage Unit", "Display Unit", "Wall Panelling", "Wallpaper", "Wall Beading", "TV Bottom Unit", "TV Wall Panelling"],
                cabin2: ["Table", "Chair", "Storage Unit", "Display Unit", "Wall Panelling", "Wallpaper", "Wall Beading", "TV Bottom Unit", "TV Wall Panelling"],
                cabin3: ["Table", "Chair", "Storage Unit", "Display Unit", "Wall Panelling", "Wallpaper", "Wall Beading", "TV Bottom Unit", "TV Wall Panelling"],
                cabin4: ["Table", "Chair", "Storage Unit", "Display Unit", "Wall Panelling", "Wallpaper", "Wall Beading", "TV Bottom Unit", "TV Wall Panelling"],
                cabin5: ["Table", "Chair", "Storage Unit", "Display Unit", "Wall Panelling", "Wallpaper", "Wall Beading", "TV Bottom Unit", "TV Wall Panelling"],
                conferenceRoom: ["Conference Table", "Chair", "Wall Panelling", "Wallpaper", "Wall Beading", "TV Wall Panelling", "Display Unit", "Storage Unit"],
                // pantry already defined above
                storage: ["Storage Unit", "Shelving", "Racking", "Wall Panelling", "Wall Beading"],
                // washroom1 and washroom2 already defined above
                avRoom: ["AV Rack", "Storage Unit", "Wall Panelling", "Wall Beading"],
                serverRoom: ["Server Rack", "Storage Unit", "Wall Panelling", "Wall Beading"],
                supervisorCabin: ["Table", "Chair", "Storage Unit", "Display Unit", "Wall Panelling", "Wallpaper", "Wall Beading", "TV Bottom Unit", "TV Wall Panelling"],
                ceoCabin: ["Table", "Chair", "Storage Unit", "Display Unit", "Wall Panelling", "Wallpaper", "Wall Beading", "TV Bottom Unit", "TV Wall Panelling"],
                trainingRoom: ["Training Table", "Chair", "Wall Panelling", "Wallpaper", "Wall Beading", "TV Wall Panelling", "Display Unit", "Storage Unit"],
                executiveCabin: ["Table", "Chair", "Storage Unit", "Display Unit", "Wall Panelling", "Wallpaper", "Wall Beading", "TV Bottom Unit", "TV Wall Panelling"],

                // Spa & Salon areas
                hairCutSection: ["Mirror", "Mirror with LED", "Mirror with Storage", "Wall Panelling", "Wall Beading", "Wallpaper", "Display Unit"],
                hairWash: ["Mirror", "Mirror with LED", "Mirror with Storage", "Wall Panelling", "Wall Beading", "Wallpaper", "Bottom Unit", "Overhead Unit", "Counter Top", "Platform"],
                hairSpa: ["Mirror", "Mirror with LED", "Mirror with Storage", "Wall Panelling", "Wall Beading", "Wallpaper", "Bottom Unit", "Overhead Unit", "Counter Top", "Platform", "Display Unit"],
                facialRoom: ["Mirror", "Mirror with LED", "Mirror with Storage", "Wall Panelling", "Wall Beading", "Wallpaper", "Vanity Unit", "Bottom Unit", "Overhead Unit", "Loft", "Counter Top", "Platform", "Cot"],
                pedicure: ["Mirror", "Mirror with LED", "Mirror with Storage", "Wall Panelling", "Wall Beading", "Wallpaper", "Bottom Unit", "Overhead Unit", "Counter Top", "Platform"],
                manicure: ["Mirror", "Mirror with LED", "Mirror with Storage", "Wall Panelling", "Wall Beading", "Wallpaper", "Bottom Unit", "Overhead Unit", "Counter Top", "Platform"],
                nailArt: ["Mirror", "Mirror with LED", "Mirror with Storage", "Wall Panelling", "Wall Beading", "Wallpaper", "Bottom Unit", "Overhead Unit", "Counter Top", "Platform"],

                // Café & Restaurant areas
                diningSpace: ["Dining Table", "Chair", "Booth Seating", "Wall Panelling", "Wall Beading", "Wallpaper", "Display Unit"],
                seatingSpace: ["Chair", "Table", "Booth Seating", "Wall Panelling", "Wall Beading", "Wallpaper", "Display Unit"],
                pantryRoom: ["Bottom Unit", "Overhead Unit", "Loft", "Tall Unit", "Ledge", "Profile Shutter", "Counter Top"]
            };

            // Define area display names
            const areaDisplayNames = {
                foyer: "Foyer Area",
                living: "Living Room",
                dining: "Dining Room",
                kitchen: "Kitchen",
                utility: "Utility Area",
                masterWashroom: "Master Washroom",
                commonWashroom: "Common Washroom",
                washroom1: "Washroom 1",
                washroom2: "Washroom 2",
                masterBedroom: "Master Bedroom",
                kidsBedroom: "Kids Bedroom",
                guestBedroom: "Guest Bedroom",
                bedroom1: "Bedroom 1",
                bedroom2: "Bedroom 2",
                bedroom3: "Bedroom 3",
                bedroom4: "Bedroom 4",
                bedroom5: "Bedroom 5",
                balcony: "Balcony",
                pantry: "Pantry",
                studyRoom: "Study Room",
                homeTheatre: "Home Theatre",
                officeRoom: "Office Room",
                entertainmentRoom: "Entertainment Room",
                bookshelf: "Book Shelf",
                civilWork: "Civil/Other Work",

                // Office areas
                reception: "Reception",
                waitingArea: "Waiting Area",
                workingSpace: "Working Space",
                mdCabin: "MD Cabin",
                cabin1: "Cabin 1",
                cabin2: "Cabin 2",
                cabin3: "Cabin 3",
                cabin4: "Cabin 4",
                cabin5: "Cabin 5",
                conferenceRoom: "Conference Room",
                storage: "Storage",
                avRoom: "AV Room",
                serverRoom: "Server Room",
                supervisorCabin: "Supervisor Cabin",
                ceoCabin: "CEO Cabin",
                trainingRoom: "Training Room",
                executiveCabin: "Executive Cabin",

                // Spa & Salon areas
                hairCutSection: "Hair Cut Section",
                hairWash: "Hair Wash",
                hairSpa: "Hair Spa",
                facialRoom: "Facial Room",
                pedicure: "Pedicure",
                manicure: "Manicure",
                nailArt: "Nail Art",

                // Café & Restaurant areas
                diningSpace: "Dining Space",
                seatingSpace: "Seating Space",
                pantryRoom: "Pantry Room"
            };

            // Define finishes for each material (updated as per requirements)
            const materialFinishes = {
                "Carcass - Plywood MR (19mm) Shutter - HDHMR (19mm)": ["Laminate", "Acrylic", "Duco", "Veneer", "CNC with Duco", "CNC", "CNC with Paint", "Cane", "Wallpaper", "Customised Wallpaper"],
                "Carcass - Plywood BWP (19mm) Shutter - HDHMR (19mm)": ["Laminate", "Acrylic", "Duco", "Veneer", "CNC with Duco", "CNC", "CNC with Paint", "Cane", "Wallpaper", "Customised Wallpaper"],
                "Carcass - Plywood MR (19mm)": ["Laminate", "Acrylic", "Duco", "Veneer"],
                "Carcass - Plywood BWP (19mm)": ["Laminate", "Acrylic", "Duco", "Veneer"],
                "Plywood MR (19mm)": ["Laminate"],
                "Plywood BWP (19mm)": ["Laminate"],
                "Carcass - Plywood MR (19mm) Shutter - Lacquered Glass": ["Laminate", "Toughened Glass"],
                "Carcass - Plywood BWP (19mm) Shutter - Lacquered Glass": ["Laminate", "Toughened Glass"],
                "Carcass - Plywood MR (19mm) Shutter - Profile Shutter": ["Laminate", "Acrylic", "Veneer", "Duco"],
                "Carcass - Plywood BWP (19mm) Shutter - Profile Shutter": ["Laminate", "Acrylic", "Veneer", "Duco"],
                "Plywood MR (12mm)": ["Mirror", "Paint", "Wallpaper", "Customised Wallpaper", "Laminate", "Acrylic", "Duco", "Veneer"],
                "Plywood BWP (12mm)": ["Wallpaper", "Customised Wallpaper", "Paint", "Laminate", "Acrylic", "Duco", "Veneer"],
                "Carcass - Plywood MR (12mm) Shutter - HDHMR (12mm)": ["Laminate", "Acrylic", "Duco", "Veneer"],
                "Carcass - Plywood BWP (12mm) Shutter - HDHMR (12mm)": ["Laminate", "Acrylic", "Duco", "Veneer"],
                "MDF": ["POP", "Paint", "CNC with Duco", "CNC", "CNC with Paint"],
                "HDHMR": ["POP", "Paint", "CNC with Duco", "CNC", "CNC with Paint"],
                "Fabric": ["Fabric"],
                "Toughened Glass": ["Toughened Glass"],
                "Mirror": ["Mirror"],
                "Mirror with LED": ["Mirror with LED"],
                "MS": ["MS Work"],
                "Wallpaper (Per Roll)": ["Wallpaper"],
                "Customised Wallpaper (Per Roll)": ["Customised Wallpaper"],
                "Stone": ["Granite", "Quartz (Per Slab)", "Marble"],
                "Kitchen Accessories": ["SS Cutlery Set of 3", "Tandem Cutlery Set of 3", "Tandem Drawers", "Oil Pullout", "Pantry Accessories", "Wicker Basket", "Magic Corner", "Lift Up Unit", "Organizer"],
                "Wardrobe Accessories": ["Pull Down Rod", "Clothes Holder", "Tie Rack", "Wardrobe Organizer"],
                "Ceiling": ["False Ceiling", "Grid False Ceiling", "SPC Ceiling"],
                "Flooring": ["Wooden Flooring", "Concrete Flooring", "Floor Tiles", "Wall Tiles", "SPC Flooring"],
                "Paint": ["Texture Paint", "Asian Paint"],
                "Electric Work": ["Electrical Work", "Lighting Fixture", "Cove Light", "Profile Light", "Surface Light", "Spot Light", "Track Light", "Smart Light"],
                "Plumbing": ["Plumbing Work", "Basin Set", "Commode Set", "Shower Set"],
                "Civil Work": ["Wall Construction", "Demolition", "Debris Removal", "Glass Partition", "Glass Door", "Wood Partition", "Pelmet", "MS Work", "Acoustic Panelling", "Door with Frame"],
                "Deep Cleaning": ["Deep Cleaning"],
                "Floor Guard": ["Floor Guard"],
                "Transportation": ["Transportation"]
            };

            // Define pricing matrix (updated with exact rates from requirements)
            const pricingMatrix = {
                "Carcass - Plywood MR (19mm) Shutter - HDHMR (19mm)": {
                    "Laminate": 1650,
                    "Acrylic": 1900,
                    "Duco": 2100,
                    "Veneer": 2100,
                    "CNC with Duco": 2300,
                    "CNC": 1900,
                    "CNC with Paint": 2000,
                    "Cane": 1900,
                    "Wallpaper": 1800,
                    "Customised Wallpaper": 2000
                },
                "Carcass - Plywood BWP (19mm) Shutter - HDHMR (19mm)": {
                    "Laminate": 1950,
                    "Acrylic": 2200,
                    "Duco": 2400,
                    "Veneer": 2400,
                    "CNC with Duco": 2600,
                    "CNC": 2200,
                    "CNC with Paint": 2300,
                    "Cane": 2200,
                    "Wallpaper": 2100,
                    "Customised Wallpaper": 2300
                },
                "Carcass - Plywood MR (19mm)": {
                    "Laminate": 1250,
                    "Acrylic": 1500,
                    "Duco": 1700,
                    "Veneer": 1700
                },
                "Carcass - Plywood BWP (19mm)": {
                    "Laminate": 1550,
                    "Acrylic": 1800,
                    "Duco": 2000,
                    "Veneer": 2000
                },
                "Plywood MR (19mm)": {
                    "Laminate": 950
                },
                "Plywood BWP (19mm)": {
                    "Laminate": 1250
                },
                "Carcass - Plywood MR (19mm) Shutter - Lacquered Glass": {
                    "Laminate": 2100,
                    "Toughened Glass": 2300
                },
                "Carcass - Plywood BWP (19mm) Shutter - Lacquered Glass": {
                    "Laminate": 2300,
                    "Toughened Glass": 2600
                },
                "Carcass - Plywood MR (19mm) Shutter - Profile Shutter": {
                    "Laminate": 1850,
                    "Acrylic": 2150,
                    "Veneer": 2250,
                    "Duco": 2250
                },
                "Carcass - Plywood BWP (19mm) Shutter - Profile Shutter": {
                    "Laminate": 2150,
                    "Acrylic": 2450,
                    "Veneer": 2550,
                    "Duco": 2550
                },
                "Plywood MR (12mm)": {
                    "Mirror": 1250,
                    "Paint": 1150,
                    "Wallpaper": 1400,
                    "Customised Wallpaper": 1600,
                    "Laminate": 950,
                    "Acrylic": 1200,
                    "Duco": 1200,
                    "Veneer": 1400
                },
                "Plywood BWP (12mm)": {
                    "Wallpaper": 1800,
                    "Customised Wallpaper": 2000,
                    "Paint": 1450,
                    "Laminate": 1150,
                    "Acrylic": 1400,
                    "Duco": 1400,
                    "Veneer": 1600
                },
                "Carcass - Plywood MR (12mm) Shutter - HDHMR (12mm)": {
                    "Laminate": 1550,
                    "Acrylic": 1800,
                    "Duco": 2000,
                    "Veneer": 2000
                },
                "Carcass - Plywood BWP (12mm) Shutter - HDHMR (12mm)": {
                    "Laminate": 1850,
                    "Acrylic": 2100,
                    "Duco": 2300,
                    "Veneer": 2300
                },
                "MDF": {
                    "POP": 1250,
                    "Paint": 950,
                    "CNC with Duco": 1800,
                    "CNC": 1400,
                    "CNC with Paint": 1500
                },
                "HDHMR": {
                    "POP": 1350,
                    "Paint": 1050,
                    "CNC with Duco": 1900,
                    "CNC": 1500,
                    "CNC with Paint": 1600
                },
                "Fabric": {
                    "Fabric": 550
                },
                "Toughened Glass": {
                    "Toughened Glass": 750
                },
                "Mirror": {
                    "Mirror": 550
                },
                "Mirror with LED": {
                    "Mirror with LED": 750
                },
                "MS": {
                    "MS Work": 1000
                },
                "Wallpaper (Per Roll)": {
                    "Wallpaper": 6000
                },
                "Customised Wallpaper (Per Roll)": {
                    "Customised Wallpaper": 10000
                },
                "Stone": {
                    "Granite": 550,
                    "Quartz (Per Slab)": 32000,
                    "Marble": 750
                },
                "Kitchen Accessories": {
                    "SS Cutlery Set of 3": 12000,
                    "Tandem Cutlery Set of 3": 15000,
                    "Tandem Drawers": 7000,
                    "Oil Pullout": 6000,
                    "Pantry Accessories": 35000,
                    "Wicker Basket": 6000,
                    "Magic Corner": 15000,
                    "Lift Up Unit": 7000,
                    "Organizer": 3000
                },
                "Wardrobe Accessories": {
                    "Pull Down Rod": 17000,
                    "Clothes Holder": 7000,
                    "Tie Rack": 3000,
                    "Wardrobe Organizer": 15000
                },
                "Ceiling": {
                    "False Ceiling": 110,
                    "Grid False Ceiling": 130,
                    "SPC Ceiling": 150
                },
                "Flooring": {
                    "Wooden Flooring": 200,
                    "Concrete Flooring": 150,
                    "Floor Tiles": 120,
                    "Wall Tiles": 100,
                    "SPC Flooring": 180
                },
                "Paint": {
                    "Texture Paint": 25,
                    "Asian Paint": 30
                },
                "Electric Work": {
                    "Electrical Work": 65000,
                    "Lighting Fixture": 850,
                    "Cove Light": 1200,
                    "Profile Light": 1500,
                    "Surface Light": 800,
                    "Spot Light": 600,
                    "Track Light": 1000,
                    "Smart Light": 2000
                },
                "Plumbing": {
                    "Plumbing Work": 25000,
                    "Basin Set": 8000,
                    "Commode Set": 12000,
                    "Shower Set": 15000
                },
                "Civil Work": {
                    "Wall Construction": 120,
                    "Demolition": 80,
                    "Debris Removal": 5000,
                    "Glass Partition": 1800,
                    "Glass Door": 2500,
                    "Wood Partition": 1500,
                    "Pelmet": 800,
                    "MS Work": 1000,
                    "Acoustic Panelling": 1200,
                    "Door with Frame": 3500
                },
                "Deep Cleaning": {
                    "Deep Cleaning": 12000
                },
                "Floor Guard": {
                    "Floor Guard": 7000
                },
                "Transportation": {
                    "Transportation": 5000
                }
            };

            // Special pricing for loft elements
            const loftPricing = {
                "Carcass - Plywood MR (19mm) Shutter - HDHMR (19mm)": {
                    "Laminate": 950,
                    "Acrylic": 1250,
                    "Duco": 1450,
                    "Veneer": 1450,
                    "CNC with Duco": 1550,
                    "Cane": 1450
                },
                "Carcass - Plywood BWP (19mm) Shutter - HDHMR (19mm)": {
                    "Laminate": 1250,
                    "Acrylic": 1550,
                    "Duco": 1750,
                    "Veneer": 1750,
                    "CNC with Duco": 1850,
                    "Cane": 1750
                }
            };

            let currentElement = null;
            let currentArea = null;
            let estimateItems = [];
            let groupedItems = {};

            // Update elements based on selected area
            function updateElements() {
                const areaSelect = document.getElementById('areaSelect');
                const area = areaSelect.value;
                currentArea = areaSelect.options[areaSelect.selectedIndex].text;
                const elementContainer = document.getElementById('elementContainer');

                elementContainer.innerHTML = '';

                if (area && areaElements[area]) {
                    areaElements[area].forEach(element => {
                        const elementDiv = document.createElement('div');
                        elementDiv.className = 'element-item';
                        elementDiv.textContent = element;
                        elementDiv.addEventListener('click', () => selectElement(element));
                        elementContainer.appendChild(elementDiv);
                    });
                }
            }

            // Update finishes based on selected material
            function updateFinishes() {
                const materialSelect = document.getElementById('materialSelect');
                const finishSelect = document.getElementById('finishSelect');
                const material = materialSelect.options[materialSelect.selectedIndex].text;

                finishSelect.innerHTML = '<option value="">-- Select Finish --</option>';

                if (material && materialFinishes[material]) {
                    materialFinishes[material].forEach(finish => {
                        const option = document.createElement('option');
                        option.value = finish.toLowerCase().replace(/\s+/g, '-');
                        option.textContent = finish;
                        finishSelect.appendChild(option);
                    });
                }

                calculateRate();
            }

            // Select an element
            function selectElement(element) {
                currentElement = element;
                document.getElementById('elementDetails').style.display = 'block';

                // Scroll to element details
                document.getElementById('elementDetails').scrollIntoView({ behavior: 'smooth' });

                // Reset form
                document.getElementById('materialSelect').selectedIndex = 0;
                document.getElementById('finishSelect').innerHTML = '<option value="">-- Select Finish --</option>';
                document.getElementById('unitSelect').selectedIndex = 0;
                document.getElementById('quantity').value = 1;
                document.getElementById('width').value = '';
                document.getElementById('height').value = '';
                document.getElementById('rate').value = '';
                document.getElementById('amount').value = '';
            }

            // Calculate rate based on material and finish
            function calculateRate() {
                const materialSelect = document.getElementById('materialSelect');
                const finishSelect = document.getElementById('finishSelect');

                if (materialSelect.value && finishSelect.value) {
                    const material = materialSelect.options[materialSelect.selectedIndex].text;
                    const finish = finishSelect.options[finishSelect.selectedIndex].text;

                    // Check if this is a loft element with special pricing
                    let rate = null;
                    if (currentElement === "Loft" && loftPricing[material] && loftPricing[material][finish]) {
                        rate = loftPricing[material][finish];
                    } else if (pricingMatrix[material] && pricingMatrix[material][finish]) {
                        rate = pricingMatrix[material][finish];
                    }

                    if (rate !== null) {
                        document.getElementById('rate').value = rate.toLocaleString('en-IN');
                        calculateAmount();
                    } else {
                        document.getElementById('rate').value = 'N/A';
                        document.getElementById('amount').value = 'N/A';
                    }
                }
            }

            // Calculate amount based on dimensions and quantity
            function calculateAmount() {
                const width = parseFloat(document.getElementById('width').value) || 0;
                const height = parseFloat(document.getElementById('height').value) || 0;
                const quantity = parseFloat(document.getElementById('quantity').value) || 0;
                const rate = parseFloat(document.getElementById('rate').value.replace(/,/g, '')) || 0;
                const unit = document.getElementById('unitSelect').value;

                let amount = 0;

                if (unit === 'sft') {
                    const area = width * height;
                    amount = area * quantity * rate;
                } else if (unit === 'rft') {
                    const length = width;
                    amount = length * quantity * rate;
                } else if (unit === 'nos') {
                    amount = quantity * rate;
                } else if (unit === 'lsm') {
                    amount = rate; // Lump sum amount
                }

                if (!isNaN(amount)) {
                    document.getElementById('amount').value = amount.toLocaleString('en-IN');
                } else {
                    document.getElementById('amount').value = '0';
                }
            }

            // Add item to estimate table
            function addToEstimate() {
                const materialSelect = document.getElementById('materialSelect');
                const finishSelect = document.getElementById('finishSelect');
                const unitSelect = document.getElementById('unitSelect');
                const quantity = document.getElementById('quantity').value;
                const width = document.getElementById('width').value;
                const height = document.getElementById('height').value;
                const rate = document.getElementById('rate').value;
                const amount = document.getElementById('amount').value;

                if (!currentElement || !materialSelect.value || !finishSelect.value || !unitSelect.value) {
                    alert('Please fill all required fields');
                    return;
                }

                const areaKey = document.getElementById('areaSelect').value;
                const areaName = areaDisplayNames[areaKey] || areaKey;
                const material = materialSelect.options[materialSelect.selectedIndex].text;
                const finish = finishSelect.options[finishSelect.selectedIndex].text;
                const unit = unitSelect.options[unitSelect.selectedIndex].text;

                // Check if property type is Villa and get selected floors
                let floor = '';
                const propertyType = document.getElementById('propertyType').value;
                if (propertyType === 'villa') {
                    const floorCheckboxes = document.querySelectorAll('.floor-checkbox input[type="checkbox"]:checked');
                    if (floorCheckboxes.length > 0) {
                        floor = Array.from(floorCheckboxes).map(cb => cb.value).join(', ');
                    }
                }

                // Add to estimate items array
                estimateItems.push({
                    area: areaName,
                    element: currentElement,
                    material: material,
                    finish: finish,
                    dimensions: width && height ? `${width} ft x ${height} ft` : '-',
                    unit: unit,
                    quantity: quantity,
                    rate: rate,
                    amount: amount,
                    amountValue: parseFloat(amount.replace(/,/g, '')) || 0,
                    floor: floor
                });

                // Render the estimate table
                renderEstimateTable();

                // Update summary
                updateSummary();

                // Reset form
                cancelElement();
            }

            // Render estimate table with area grouping
            function renderEstimateTable() {
                const tableBody = document.getElementById('estimateTable').getElementsByTagName('tbody')[0];
                tableBody.innerHTML = '';

                // Group items by area
                groupedItems = {};
                estimateItems.forEach(item => {
                    const groupKey = item.floor ? `${item.floor} - ${item.area}` : item.area;
                    if (!groupedItems[groupKey]) {
                        groupedItems[groupKey] = [];
                    }
                    groupedItems[groupKey].push(item);
                });

                // Render table with area headers
                Object.keys(groupedItems).forEach(group => {
                    // Add area header row
                    const headerRow = document.createElement('tr');
                    headerRow.className = 'area-header';
                    const headerCell = document.createElement('td');
                    headerCell.colSpan = 10;
                    headerCell.textContent = group;
                    headerRow.appendChild(headerCell);
                    tableBody.appendChild(headerRow);

                    // Add items for this area
                    groupedItems[group].forEach((item, index) => {
                        const row = document.createElement('tr');

                        row.innerHTML = `
                            <td>${item.area}</td>
                            <td>${item.element}</td>
                            <td>${item.material}</td>
                            <td>${item.finish}</td>
                            <td>${item.dimensions}</td>
                            <td>${item.unit}</td>
                            <td>${item.quantity}</td>
                            <td>${item.rate}</td>
                            <td>${item.amount}</td>
                            <td>
                                <button class="btn-edit">Edit</button>
                                <button class="btn-delete">Delete</button>
                            </td>
                        `;

                        // Add event listeners for edit and delete
                        const editButton = row.querySelector('.btn-edit');
                        const deleteButton = row.querySelector('.btn-delete');

                        editButton.addEventListener('click', () => editItem(group, index));
                        deleteButton.addEventListener('click', () => deleteItem(group, index));

                        tableBody.appendChild(row);
                    });
                });
            }

            // Update summary table with discount and savings
            function updateSummary() {
                const summaryTableBody = document.getElementById('summaryTableBody');
                summaryTableBody.innerHTML = '';

                // Group items by area and calculate totals
                const areaTotals = {};
                estimateItems.forEach(item => {
                    if (!areaTotals[item.area]) {
                        areaTotals[item.area] = 0;
                    }
                    areaTotals[item.area] += item.amountValue;
                });

                // Add rows for each area
                let rowCount = 1;
                let total = 0;

                Object.keys(areaTotals).forEach(area => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${rowCount}</td>
                        <td>${area}</td>
                        <td>${areaTotals[area].toLocaleString('en-IN')}</td>
                    `;
                    summaryTableBody.appendChild(row);
                    total += areaTotals[area];
                    rowCount++;
                });

                // Calculate GST, discount, and final amount
                const gst = total * 0.18;
                const grandTotal = total + gst;
                const discountPercent = parseFloat(document.getElementById('discountPercent').value) || 15;
                const discount = grandTotal * (discountPercent / 100);
                const finalAmount = grandTotal - discount;
                const savings = discount;

                // Update summary totals
                document.getElementById('summaryTotal').textContent = total.toLocaleString('en-IN', { maximumFractionDigits: 2 });
                document.getElementById('summaryGst').textContent = gst.toLocaleString('en-IN', { maximumFractionDigits: 2 });
                document.getElementById('summaryGrandTotal').textContent = grandTotal.toLocaleString('en-IN', { maximumFractionDigits: 2 });
                document.getElementById('summaryDiscount').textContent = discount.toLocaleString('en-IN', { maximumFractionDigits: 2 });
                document.getElementById('summaryFinalAmount').textContent = finalAmount.toLocaleString('en-IN', { maximumFractionDigits: 2 });
                document.getElementById('summarySavings').textContent = savings.toLocaleString('en-IN', { maximumFractionDigits: 2 });
            }

            // Apply discount
            function applyDiscount() {
                updateSummary();
            }

            // Edit item
            function editItem(group, index) {
                // Find the item in the estimateItems array
                const groupKeys = Object.keys(groupedItems);
                const itemIndex = estimateItems.findIndex(item => {
                    const itemGroup = item.floor ? `${item.floor} - ${item.area}` : item.area;
                    return itemGroup === group;
                });

                if (itemIndex !== -1) {
                    const item = estimateItems[itemIndex + index];

                    // Populate the form with item details
                    document.getElementById('areaSelect').value = document.getElementById('areaSelect').value; // Keep current area
                    selectElement(item.element);

                    // Set material, finish, etc.
                    // This would need more complex implementation to select the right options
                    // For now, just show an alert
                    alert('Edit functionality would be implemented here. In a full implementation, this would populate the form with the item details for editing.');
                }
            }

            // Delete item
            function deleteItem(group, index) {
                if (confirm('Are you sure you want to delete this item?')) {
                    // Find the item in the estimateItems array
                    const groupKeys = Object.keys(groupedItems);
                    const itemIndex = estimateItems.findIndex(item => {
                        const itemGroup = item.floor ? `${item.floor} - ${item.area}` : item.area;
                        return itemGroup === group;
                    });

                    if (itemIndex !== -1) {
                        estimateItems.splice(itemIndex + index, 1);
                        renderEstimateTable();
                        updateSummary();
                    }
                }
            }

            // Cancel element selection
            function cancelElement() {
                currentElement = null;
                document.getElementById('elementDetails').style.display = 'none';
            }

            // Share on WhatsApp
            function shareWhatsapp() {
                const clientName = document.getElementById('clientName').value || 'Client';
                const phoneNumber = '919902571049'; // Company phone number
                const message = `Estimate for ${clientName} from Bhavana Interiors & Decorators`;

                // Create WhatsApp share URL
                const whatsappUrl = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;

                // Open in new tab
                window.open(whatsappUrl, '_blank');
            }

            // Export as PDF - OPTIMIZED VERSION
            function exportPdf() {
                // Update PDF values first
                updatePdfValues();

                // Update summary for PDF
                updatePdfSummary();

                // Update estimate table for PDF (remove Actions column)
                updatePdfEstimateTable();

                // Create a clone of the PDF container
                const pdfContainer = document.getElementById('pdfExportContainer');

                // Add footer content
                const pdfFooter = document.querySelector('.pdf-footer');
                pdfFooter.innerHTML = `
                    <h3>Material Brands</h3>
                    <table>
                        <tr>
                            <th>Material</th>
                            <th>Brand</th>
                        </tr>
                        <tr>
                            <td>Plywood</td>
                            <td>Commercial Ply (Grade ISI 303 MR & ISI 710 BWP)</td>
                        </tr>
                        <tr>
                            <td>HDHMR</td>
                            <td>Action Tesa, Greenply</td>
                        </tr>
                        <tr>
                            <td>Laminate</td>
                            <td>Virgo, Century, Merino, Sayaji</td>
                        </tr>
                        <tr>
                            <td>Acrylic</td>
                            <td>Kori, Sayaji</td>
                        </tr>
                        <tr>
                            <td>Hinges</td>
                            <td>ebco, Hettich, Haffele</td>
                        </tr>
                        <tr>
                            <td>Channels</td>
                            <td>ebco</td>
                        </tr>
                        <tr>
                            <td>Locks</td>
                            <td>Europa & Godrej</td>
                        </tr>
                        <tr>
                            <td>Gypsum Board</td>
                            <td>Saint Gobain</td>
                        </tr>
                        <tr>
                            <td>Glass</td>
                            <td>Modiguard, Saint Gobain</td>
                        </tr>
                        <tr>
                            <td>Wires and Switches</td>
                            <td>GM, Anchor</td>
                        </tr>
                    </table><br>

                    <h3>Material Specifications</h3>
                    <p><strong>Ply Thickness</strong> - Premium 19mm Thick Ply for Carcass—engineered for superior strength, durability, and long-lasting performance. Ideal for modular kitchens, wardrobes, and furniture, this high-quality plywood resists warping, termites, and moisture, ensuring a flawless finish. Its robust construction provides excellent load-bearing capacity, making it perfect for heavy-duty storage solutions. Smooth surfaces allow seamless laminates & veneers, enhancing aesthetics.</p>

                    <p><strong>HDHMR Thickness</strong> - Shutters with premium 19mm Thick HDHMR (High Density High Moisture Resistance) boards—engineered for superior durability, strength, and moisture resistance. Perfect for kitchens, bathrooms, and high-humidity areas, these boards ensure warp-free, long-lasting performance with a smooth finish for seamless painting or laminating. Lightweight yet robust, HDHMR provides better screw-holding capacity than plywood, making it ideal for shutter applications. Eco-friendly, termite-proof, and cost-effective, it’s the smart choice for modern interiors.</p>

                    <p><strong>Inner Laminate</strong> - Premium 0.8mm thick standard laminate from Micas (MAT1762)—perfect for both residential and commercial spaces! This high-quality laminate offers a sleek, durable finish that resists scratches, stains, and daily wear while enhancing aesthetics. Easy to clean and maintain, Micas MAT1762 combines affordability with long-lasting performance.</p>

                    <p><strong>Outer Laminate</strong> - Premium 1mm Standard materials from our exclusive catalogues—all under ₹2000! Perfect for both residential & commercial spaces, our high-quality finishes offer durability, elegance, and affordability. Whether you need sleek laminates, stylish veneers, or modern acrylics, we deliver top-tier options without exceeding your budget.</p>

                    <p><strong>Handles and Knobs</strong> - Stylish handles and knobs from our basic range, priced up to ₹200 per piece. Whether you prefer sleek modern designs or classic elegance, we offer a variety of options to match your décor. Upgrade your cabinets, drawers, and doors with premium-quality hardware—all within your budget.</p>

                    <p><strong>Locks</strong> - Option to choose high-quality locks from trusted brands—Europa and Godrej. Known for their durability, sleek designs, and advanced security features, these locks ensure both safety and elegance for your interiors. Whether you prefer modern smart locks or classic mechanical ones, Europa and Godrej offer a range of options to match your needs.</p>

                    <p><strong>SS Cutlery Unit Set of 3</strong> - Premium SS Cutlery Unit Set of 3 – a perfect blend of style, durability, and smart organization! Crafted from high-quality stainless steel, this sleek and modern set includes three versatile units designed to store spoons, forks, knives, and other essentials neatly. The rust-resistant, easy-to-clean design ensures long-lasting hygiene, while the space-saving stackable feature keeps your countertop clutter-free.</p>

                    <p><strong>Tandem Box (Haffele) Double Gallery</strong> - Hafele Tandem Box Double Gallery – the ultimate solution for seamless storage and sleek functionality! Designed for modern homes, this high-quality accessory offers smooth, full-extension drawer movement with superior load-bearing capacity. Its dual-level design maximizes space, allowing easy access to utensils, cutlery, and pantry items. Built with durable materials and a soft-closing mechanism, it ensures noise-free operation and long-lasting performance. Perfect for organized, clutter-free kitchens, the Tandem Box Double Gallery blends elegance with efficiency.</p>

                    <p><strong>Oil Pullout</strong> - Premium Oil Pullout accessory—designed for effortless storage and easy access to cooking oils & bottles. This sleek, space-saving unit features smooth gliding mechanisms, durable construction, and spill-proof design, keeping your countertops clutter-free.</p>

                    <p><strong>Wicker Basket</strong> - Wicker Baskets are perfect for organizing fruits, veggies, bread, or pantry essentials, these handwoven baskets add a rustic charm while keeping your kitchen clutter-free. Made from high-quality natural fibers, they’re lightweight, breathable, and eco-friendly. Ideal for countertops, shelves, or farmhouse-style décor, our wicker baskets blend functionality with timeless elegance. Available in multiple sizes & designs to suit your kitchen aesthetic.</p>

                    <p><strong>Rolling Shutter</strong> - Sleek and durable Rolling Shutter—the perfect blend of functionality and style! Ideal for modern homes and commercial spaces, our high-quality shutters provide enhanced security, space-saving convenience, and easy operation. Made from robust materials, they resist moisture, grease, and wear, ensuring long-lasting performance. Whether concealing appliances, pantry shelves, or countertop clutter, these shutters offer a seamless, space-efficient solution. Choose from a variety of finishes to match your kitchen décor.</p>

                    <p><strong>Channels</strong> - Our premium drawer channels ensure smooth, noiseless operation with a load capacity of up to 45 kg (100 lbs) per pair, making them ideal for heavy-duty use. Designed for durability, they feature full-extension or soft-close mechanisms for seamless access. Under standard conditions, these channels can withstand 70,000 to 120,000 open-close cycles, ensuring long-term reliability. For optimal performance, avoid overloading and ensure proper alignment during installation. Suitable for residential, commercial, and industrial applications, our channels guarantee effortless functionality for years.</p>

                    <p><strong>Hinges</strong> - Our high-quality hinges are designed for all types of shutters—wooden, laminate, and glass—ensuring smooth operation and long-lasting performance. Each hinge is tested to support weights up to 30-50 kg, depending on size and material, preventing sagging and wear. Under standard conditions, these hinges can endure 50,000 to 100,000 open-close cycles, maintaining flawless functionality for years. Built with corrosion-resistant materials, they perform reliably even in humid or high-usage environments.</p><br>

                    <h3>Why Plywood is a Preferred Material for Interiors</h3>
                    <p>High-quality 19mm plywood is crafted through a meticulous process to ensure durability, strength, and a flawless finish—perfect for interior applications like furniture, cabinetry, and wall paneling.</p>

                    <p><strong>Log Selection & Peeling</strong> – Premium hardwood or softwood logs are selected, debarked, and rotary-peeled into thin veneers.</p>

                    <p><strong>Drying & Grading</strong> – The veneers are kiln-dried to optimal moisture content and graded for quality.</p>

                    <p><strong>Layering & Gluing</strong> – Multiple veneers are layered in cross-grained patterns, bonded with high-strength adhesive (UF/MRF/Phenol) for enhanced stability.</p>

                    <p><strong>Hot Pressing</strong> – The stacked veneers are compressed under high heat and pressure to form a solid, warp-resistant plywood sheet.</p>

                    <p><strong>Trimming & Sanding</strong> – The pressed plywood is trimmed to size and sanded for a smooth, even surface.</p>

                    <p><strong>Quality Check</strong> – Each sheet undergoes rigorous testing for strength, moisture resistance, and finish before approval.</p>

                    <p>The result is premium 19mm plywood—ideal for interior products due to its strength, smoothness, and resistance to warping & termites. Perfect for long-lasting, elegant designs!</p><br>

                    <h3>Warranty</h3>
                    <p>Plywood: 10 years (As per the standards)</p>
                    <p>Channels, Hinges, Locks and other accessories: As provided by the brand itself</p>
                    <p>Free Service for 2 years, after that service charges will be applicable</p><br>

                    <h3>Bank Details to Make Payment</h3>
                    <table>
                        <tr>
                            <td>Account Holder's Name</td>
                            <td>BHAVANA INTERIORS</td>
                        </tr>
                        <tr>
                            <td>Account Number</td>
                            <td>231805500398</td>
                        </tr>
                        <tr>
                            <td>IFSC Code</td>
                            <td>ICIC0002318</td>
                        </tr>
                        <tr>
                            <td>Account Type</td>
                            <td>Current</td>
                        </tr>
                        <tr>
                            <td>UPI Number</td>
                            <td>9902571049</td>
                        </tr>
                    </table><br>

                    <h3>Payment Milestones</h3>
                    <table>
                        <tr>
                            <th>Milestone</th>
                            <th>Percentage</th>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>10%</td>
                            <td>Booking amount for 3D designs & renders, material selection and 2D drawings</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>50%</td>
                            <td>To procure the materials for production of units</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>35%</td>
                            <td>After receiving the materials on the site to start the installation</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>5%</td>
                            <td>Before final fittings and handover</td>
                        </tr>
                    </table><br>

                    <h3>Terms & Conditions</h3>
                    <p><strong>1. Estimate Accuracy:</strong> The precise value of the project depends on final scope of work, site measurements, material, finishes and design changes. The initial quoted value can be changed by approximately 5-10% basis on the actual site measurement. However, in the case of customization and any additional elements addition or finishes upgrade can increase the final quote value from the initial quote value.</p>
                    <p><strong>2. Schedule:</strong> The Company and the Client will agree upon the project's timeline and the completion date. The Client understands that the schedule may be affected by unforeseen circumstances and the number of iterations in the designing phase, and the Company will make a reasonable effort to adhere to the agreed-upon timeline.</p>
                    <p><strong>3. Changes and Additional Services:</strong> Any changes or additional services requested by the Client will be subject to a written change order and may result in additional fees and also time extensions. Both Parties (The Company and the Client) will mutually agree on the changes before implementation.</p>
                    <p><strong>4. Intellectual Property:</strong> Any designs, plans, or documents created by the Company remain the intellectual property of the Company unless otherwise agreed upon in writing.</p>
                    <p><strong>5. Payment:</strong> All the payments will be made in favor of "Bhavana Interiors" only.</p>
                    <p><strong>6. Design Corrections:</strong> Designs corrections can be done 4 times only and designs corrections are available till the designing phase. No corrections will be entertained or will be charged extra if made after completeing the design phase.</p>
                    <p><strong>7. Confidentiality:</strong> Both Parties (The Company and the Client) agree to keep all project-related information and documents confidential.</p>
                    <p><strong>8. Governing Law:</strong> This Agreement shall be governed by and construed in accordance with the laws of Karnataka, India, and any disputes arising out of this Agreement will be subject to the exclusive jurisdiction of the state or federal courts located within Bengaluru, Karnataka.</p>
                    <p><strong>9. Validity:</strong> Quotation validity is 30 days from the date of issue.</p>
                    <p><strong>10. Electrical Supply:</strong> The necessary electrical supply for installation has to be provided free of cost by the client.</p>
                    <p><strong>11. Granite Installation:</strong> Granite slab may develop cracks during removal and reinstallation - the cost of replacement is not included.</p>
                    <p><strong>12. Quotation Accuracy:</strong> Our quotation is based on the provided layout and discussion. The final cost will be according to the final designs & actual site measurements.</p>
                    <p><strong>13. Extra Charges:</strong> Any additional items which are not included in the estimate will be charged extra.</p>
                    <p><strong>14. Storage Support:</strong> Storage provision should be provided for material at the site during the course of the project.</p>
                    <p><strong>15. Work Completion:</strong> 50% of the work will get completed at our warehouse and rest 50% will be done on the client's site.</p>
                    <p><strong>16. Drawers:</strong> By default 2 drawers will be provided for wardrobes, for extra drawers client have to pay extra for per drawer.</p>
                    <p><strong>17. GST:</strong> GST will be applicable as per the Govt. norms</p>
                    <p><strong>18. Termination:</strong> Either Party may terminate this Agreement in writing for a material breach by the other Party. Upon termination, the Client shall pay the Company for all services rendered up to the termination date and for any non-cancellable expenses incurred.</p>
                    <p><strong>19. Entire Agreement:</strong> This Agreement constitutes the entire understanding between the Parties (The Company and the Client) and supersedes all prior discussions and agreements, whether written or oral.</p>
                    <p><strong>20. Cancellation Policy:</strong> We endeavour to provide every customer with the best experience for their interior design needs. We do not have provisions for cancellations once booked. Exceptional cases, if any, will be at the sole discretion of Bhavana Interiors.</p>
                    <p><strong>21. Permissions:</strong> All the required permissions to work on the site will be provided by the client only.</p>
                    <p><strong>22. Refund:</strong> After booking with the 10% amount the amount will not be refunded as we'll consider it a confirm booking and align the resources accordingly.</p>
                    <p><strong>23. Timeline:</strong> 1 week of working days for 2D/3D Design post 10% advance of sub total 45- 60 working days for final delivery post 3D design approval & 50% advance of sub total.</p>
                    <p><strong>24. Product Terms:</strong> The digital & 3D image colours are indicative, please refer to actual samples at our Design Studio before finalising the finishes & handles.

                    The core materials of semi-modular solutions are provided by Bhavana Interiors.

                    All our modules are tested for international standards of strength, water- resistance, stability & durability.

                    Products which are supplied by brand partners are subject to availability and sometimes might not be available due to inventory stock out at brand’s end. If the situation arises, we will provide you an option to select from alternative products within the same price range.

                    If any amount is paid directly to a third party account (any account other than Bhavana Interiors Entity), it will be treated as Direct buying by Customer, irrespective of whether the vendor was referred by Bhavan Interiors employee or vendor claims to be Bhavana Interiors.

                    In a situation where the client chose to do direct buying of products or services (payment not done to Bhavana Interiors entity), Bhavana Interiors disclaims any liability, including warranty, unless charged for the same as a separate coordination fee for the paid amounts.

                    Bhavana Interiors will not be responsible for either cost, quality, timelines, or post-sales service (warranty) for such products and services. Any delay or collateral damage in the above scenario shall be the responsibility of the Client.</p>
                    <p><strong>25. Site Conditions:</strong> In case you are planning to retain the existing flooring (e.g.- tiles, marble) we recommend that the floor protection is obtained before the work starts on site. Its is added in the estimate by default.

                    Post installation, basic cleaning will be done at site - including dusting, sweeping, moping of all areas, removal of packaging material and debris arising from the installation activities.

                    During civil work at site, it is highly likely that existing paint on walls might get spoiled. Therefore, It’s recommended that you get a final coat of paint done after completion of all interior works. Most of the builders have the provision to keep the last coat of painting after the interior, please check with your builder (Bhavana Interiors will undertake painting activity only if an order is raised for the same).

                    Deep cleaning with the use of mechanical equipment is a paid service. It is by default added in the estimate.</p>
                    <p><strong>26. Delivery & Installation:</strong> Designs are signed off by customer and Bhavana Interiors

                    95% milestone payment is paid in full

                    Site is handed over by customer to Bhavana Interiors to start the work.</p>
                    <p><strong>27. Our Quality Assurance:</strong> Bhavana Interiors warranty protects your products and services supplied by Bhavana Interiors against any defects in materials and workmanship for a specified period, depending on the scope, from the move-in-date. If the product is found to be defective upon inspection by a company authorized representative, the defective part will be repaired/rectified/replaced as applicable.

                    We offer unparalleled FLAT 10-Year Warranty - on all woodwork (Kitchen, Wardrobes & Storage)

                    We do 100% free repair/replacement for all cabinets, shutters, drawers & panels during the entire tenure of 10 years.

                    All accessories & hardware are covered as per the respective brand's warranty policy.

                    We offer flat 1 years warranty on services like electrical work, plumbing work, civil and demolition work.

                    We offer flat 1 year warranty on services like painting, false ceiling and countertop installation.</p>
                    <p><strong>28. Warranty:</strong> Flat 10-year warranty on semi-modular kitchens, wardrobes, storage, vanity.

                    Exception Cases

                    Warranty doesn’t cover the damages that happened because of accident, abnormal use, extreme temperatures and continuous contact with water, high moisture levels or use of harsh and/or abrasive cleaning chemicals

                    Warranty doesn’t cover any defects arising out of factors out of control of Bhavana Interiors, including but not limited to: Acts of God, Abuse or negligence by the customer, Normal wear and tear, Rusting, Surface with contaminants, Failure or defects in the structure or previous coating

                    For products with manufacturer warranty, Inspection to be done by the brand technician & Bhavana Interiors will not be liable for any direct/indirect loss to the user due to the defect or delay in providing the service. Any extra cost will be borne by the customer only.</p>
                    <p><strong>29. On-Site Services:</strong> Warranty doesn’t cover the damages caused to the painted surface due to Intermittent dripping of water, water leakage, seeping and continuous dampness of the surface, fire, excessive heat exposure, corrosive agents, abrasive materials or by the customer including without limitation due to rework/fitting work done by the customer after handover.

                    Warranty doesn’t cover the damages caused due to Intermittent dripping of water, seeping and continuous dampness of the surface, fire, excessive heat exposure, rework/fitting work done by the customer after handover, Physical damage to the surface with an external force or entity, Defects arising due to failure or defects in the structure to which ceiling is anchored.

                    Warranty doesn’t cover the damages caused due to Improper power input to the mains, Electrical failures due to physical damage of conduits, wires, switches and plates, Issues in the power input source, Repaired by any other representative other than Bhavana Interiors representative or Inappropriate usage of the electrical points and appliances.

                    Bhavana Interiors warranty doesn’t cover rusting, damage caused by misuse, negligence, normal wear and tear or Plumbing failures due to physical damage or mishandling. Any leakage due to sealant in 1st year will be attended by Bhavana Interiors.

                    Warranty does not cover the following works done in the external areas of the house: Painting, water proofing, electrical point shifting or cabling and plumbing work

                    Warranty does not cover defects arising out of natural characteristics of wood or any other material used in delivery of the service

                    Warranty does not cover stains, discolouration and fading arising out of improper use of chemicals and cleaning techniques

                    The warranty terms will be honored only when the product is still at its original installed position and location.

                    The product is used for domestic purposes only

                    The warranty has not expired

                    Proof of purchase together with the appropriate warranty certificate is required to obtain benefits from this Warranty. If you have difficulty obtaining assistance, please write to: info@bhavanainteriordecorators.com</p>
                `;

                // Use html2canvas to capture the PDF container
                html2canvas(pdfContainer, {
                    scale: 2, // Higher quality
                    useCORS: true, // Allow cross-origin images
                    logging: false, // Disable logging
                    width: pdfContainer.scrollWidth,
                    height: pdfContainer.scrollHeight
                }).then(canvas => {
                    // Create PDF
                    const { jsPDF } = window.jspdf;
                    const doc = new jsPDF('p', 'mm', 'a4');

                    const imgData = canvas.toDataURL('image/jpeg', 1.0);
                    const imgWidth = doc.internal.pageSize.getWidth();
                    let imgHeight = (canvas.height * imgWidth) / canvas.width;

                    let heightLeft = imgHeight;
                    let position = 0;
                    let pageCount = 1;

                    // Add first page
                    doc.addImage(imgData, 'JPEG', 0, position, imgWidth, imgHeight);
                    heightLeft -= doc.internal.pageSize.getHeight();

                    // Add additional pages if needed
                    while (heightLeft >= 0) {
                        position = heightLeft - imgHeight;
                        doc.addPage();
                        doc.addImage(imgData, 'JPEG', 0, position, imgWidth, imgHeight);
                        heightLeft -= doc.internal.pageSize.getHeight();
                        pageCount++;
                    }

                    // Save the PDF
                    const clientName = document.getElementById('clientName').value || 'Client';
                    doc.save(`Bhavana_Interiors_Estimate_${clientName}.pdf`);
                });
            }

            // Update PDF summary table
            function updatePdfSummary() {
                const pdfSummaryTableBody = document.getElementById('pdf-summaryTableBody');
                pdfSummaryTableBody.innerHTML = '';

                // Group items by area and calculate totals
                const areaTotals = {};
                estimateItems.forEach(item => {
                    if (!areaTotals[item.area]) {
                        areaTotals[item.area] = 0;
                    }
                    areaTotals[item.area] += item.amountValue;
                });

                // Add rows for each area
                let rowCount = 1;
                let total = 0;

                Object.keys(areaTotals).forEach(area => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${rowCount}</td>
                        <td>${area}</td>
                        <td>${areaTotals[area].toLocaleString('en-IN')}</td>
                    `;
                    pdfSummaryTableBody.appendChild(row);
                    total += areaTotals[area];
                    rowCount++;
                });

                // Calculate GST, discount, and final amount
                const gst = total * 0.18;
                const grandTotal = total + gst;
                const discountPercent = parseFloat(document.getElementById('discountPercent').value) || 15;
                const discount = grandTotal * (discountPercent / 100);
                const finalAmount = grandTotal - discount;
                const savings = discount;

                // Update summary totals
                document.getElementById('pdf-summaryTotal').textContent = total.toLocaleString('en-IN', { maximumFractionDigits: 2 });
                document.getElementById('pdf-summaryGst').textContent = gst.toLocaleString('en-IN', { maximumFractionDigits: 2 });
                document.getElementById('pdf-summaryGrandTotal').textContent = grandTotal.toLocaleString('en-IN', { maximumFractionDigits: 2 });
                document.getElementById('pdf-discountPercent').textContent = discountPercent;
                document.getElementById('pdf-summaryDiscount').textContent = discount.toLocaleString('en-IN', { maximumFractionDigits: 2 });
                document.getElementById('pdf-summaryFinalAmount').textContent = finalAmount.toLocaleString('en-IN', { maximumFractionDigits: 2 });
                document.getElementById('pdf-summarySavings').textContent = savings.toLocaleString('en-IN', { maximumFractionDigits: 2 });
            }

            // Update PDF estimate table (without Actions column)
            function updatePdfEstimateTable() {
                const pdfTableBody = document.getElementById('pdf-estimateTable').getElementsByTagName('tbody')[0];
                pdfTableBody.innerHTML = '';

                // Group items by area
                const groupedItems = {};
                estimateItems.forEach(item => {
                    const groupKey = item.floor ? `${item.floor} - ${item.area}` : item.area;
                    if (!groupedItems[groupKey]) {
                        groupedItems[groupKey] = [];
                    }
                    groupedItems[groupKey].push(item);
                });

                // Render table with area headers
                Object.keys(groupedItems).forEach(group => {
                    // Add area header row
                    const headerRow = document.createElement('tr');
                    headerRow.className = 'area-header';
                    const headerCell = document.createElement('td');
                    headerCell.colSpan = 9;
                    headerCell.textContent = group;
                    headerRow.appendChild(headerCell);
                    pdfTableBody.appendChild(headerRow);

                    // Add items for this area
                    groupedItems[group].forEach(item => {
                        const row = document.createElement('tr');

                        row.innerHTML = `
                            <td>${item.area}</td>
                            <td>${item.element}</td>
                            <td>${item.material}</td>
                            <td>${item.finish}</td>
                            <td>${item.dimensions}</td>
                            <td>${item.unit}</td>
                            <td>${item.quantity}</td>
                            <td>${item.rate}</td>
                            <td>${item.amount}</td>
                        `;

                        pdfTableBody.appendChild(row);
                    });
                });
            }

            // Export as Excel
            function exportExcel() {
                // Create a new workbook
                const wb = XLSX.utils.book_new();

                // Prepare data for Excel
                const excelData = [];

                // Add company header
                excelData.push(["BHAVANA INTERIORS & DECORATORS"]);
                excelData.push(["No.96/5, 1st Floor, Dhruv Palace, Navya Nagar, Jakkur, Bangalore - 560064"]);
                excelData.push(["Website: www.bhavanainteriordecorators.com | Email ID: info@bhavanainteriordecorators.com | Phone: 9902571049"]);
                excelData.push([]);

                // Add client details
                excelData.push(["BI Executive", document.getElementById('biExecutive').value || ""]);
                excelData.push(["Client Name", document.getElementById('clientName').value || ""]);
                excelData.push(["Property Type", document.getElementById('propertyType').value || ""]);
                excelData.push(["Estimate Date", document.getElementById('estimateDate').value]);
                excelData.push(["Estimate Expiry Date", document.getElementById('expiryDate').value]);
                excelData.push([]);

                // Add summary
                excelData.push(["Summary"]);
                excelData.push(["S. No.", "Area", "Amount (₹)"]);

                // Group items by area and calculate totals
                const areaTotals = {};
                estimateItems.forEach(item => {
                    if (!areaTotals[item.area]) {
                        areaTotals[item.area] = 0;
                    }
                    areaTotals[item.area] += item.amountValue;
                });

                let rowCount = 1;
                let total = 0;

                Object.keys(areaTotals).forEach(area => {
                    excelData.push([rowCount, area, areaTotals[area]]);
                    total += areaTotals[area];
                    rowCount++;
                });

                // Calculate GST, discount, and final amount
                const gst = total * 0.18;
                const grandTotal = total + gst;
                const discountPercent = parseFloat(document.getElementById('discountPercent').value) || 15;
                const discount = grandTotal * (discountPercent / 100);
                const finalAmount = grandTotal - discount;
                const savings = discount;

                excelData.push(["", "Total Price", total]);
                excelData.push(["", "GST (18%)", gst]);
                excelData.push(["", "Grand Total", grandTotal]);
                excelData.push(["", `Discount (${discountPercent}%)`, discount]);
                excelData.push(["", "Final Amount", finalAmount]);
                excelData.push(["", "You Save", savings]);
                excelData.push([]);

                // Add detailed estimate
                excelData.push(["Detailed Woodwork Estimate"]);
                excelData.push(["Area", "Element", "Material", "Finish", "Dimensions", "Unit", "Qty", "Rate (₹)", "Amount (₹)"]);

                estimateItems.forEach(item => {
                    excelData.push([
                        item.area,
                        item.element,
                        item.material,
                        item.finish,
                        item.dimensions,
                        item.unit,
                        item.quantity,
                        item.rate,
                        item.amount
                    ]);
                });

                // Create worksheet
                const ws = XLSX.utils.aoa_to_sheet(excelData);

                // Add worksheet to workbook
                XLSX.utils.book_append_sheet(wb, ws, "Estimate");

                // Save the file
                XLSX.writeFile(wb, `Bhavana_Interiors_Estimate_${document.getElementById('clientName').value || 'Client'}.xlsx`);
            }
        </script>
</div>
@endsection