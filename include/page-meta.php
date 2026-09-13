<?php

// Every page requires this file, so it is the single place that bootstraps
// i18n — no page template needs to know about languages.
require_once __DIR__ . '/i18n.php';
require_once __DIR__ . '/site-config.php';

$page_meta_registry = [
    'index' => [
        'title' => 'Water Treatment Chemicals & Polymers | Raybon Chemicals',
        'description' => 'Raybon Chemicals supplies water and wastewater treatment chemicals, polyelectrolytes, antiscalants, and equipment. Serving industries since 1994 from Vadodara, Gujarat.',
        'keywords' => 'Raybon Chemicals, water treatment chemicals, wastewater treatment, polyelectrolytes, antiscalants',
        'h1' => 'Water and Waste Water Chemicals and Equipment',
    ],
    'aboutus-1' => [
        'title' => 'Company Overview | Raybon Chemicals',
        'description' => 'Learn about Raybon Chemicals — a Vadodara-based supplier of water and effluent treatment chemicals, dewatering polymers, and MEE antiscalants since 1994.',
        'keywords' => 'Raybon Chemicals, company overview, water treatment, Vadodara',
        'h1' => 'Company Overview',
    ],
    'aboutus-2' => [
        'title' => "CEO's Desk | Raybon Chemicals",
        'description' => 'A message from Raybon Chemicals leadership on outperforming polymers with outstanding service, long-term customer partnerships, and sustainable water treatment solutions.',
        'keywords' => 'Raybon Chemicals, CEO, water treatment company, Vadodara',
        'h1' => "CEO's Desk",
    ],
    'contact-form-thank-you' => [
        'title' => 'Thank You | Raybon Chemicals',
        'description' => 'Thank you for your enquiry. A member of the Raybon Chemicals technical team will be in touch.',
        'keywords' => 'Raybon Chemicals, enquiry received',
        'h1' => 'Thank you for your enquiry',
        'noindex' => true,
    ],
    'contact' => [
        'title' => 'Contact Us | Raybon Chemicals',
        'description' => 'Contact Raybon Chemicals in Vadodara, Gujarat. Call +91 265 298 57 33 or email chemicals@raybonchemicals.com for quotes, support, and product inquiries.',
        'keywords' => 'Raybon Chemicals, contact, Vadodara, water treatment quote',
        'h1' => 'Contact',
    ],
    'career' => [
        'title' => 'Careers | Raybon Chemicals',
        'description' => 'Explore career opportunities at Raybon Chemicals. Open roles in technical sales, field chemistry, credit control, and water treatment services in Vadodara.',
        'keywords' => 'Raybon Chemicals, careers, jobs, water treatment, Vadodara',
        'h1' => 'Career',
    ],
    'product' => [
        'title' => 'Our Products | Raybon Chemicals',
        'description' => "Browse Raybon Chemicals' full range of water treatment products — polyelectrolytes, antiscalants, bacterial cultures, defoamers, activated carbon, and more.",
        'keywords' => 'Raybon Chemicals, water treatment products, polyelectrolytes, antiscalants, defoamers',
        'h1' => 'Our Products',
    ],
    'portfolio-details-01' => [
        'title' => 'Activated Carbon | Raybon Chemicals',
        'description' => 'Powdered, granular, and coconut shell activated carbon for water filtration, decolourization, and impurity removal in industrial and wastewater applications.',
        'keywords' => 'activated carbon, water filtration, decolourization, Raybon Chemicals',
        'h1' => 'Activated Carbon',
        'image' => 'images/ProductImages/ActivatedCarbon.jpg',
        'product' => [
            'name' => 'Activated Carbon',
            'category' => 'Water Treatment Media',
        ],
    ],
    'portfolio-details-02' => [
        'title' => 'Bacterial Culture for Wastewater Treatment | Raybon Chemicals',
        'description' => 'RAYBACT bacterial cultures for biological wastewater treatment. Custom formulations for high COD, TDS, and industrial effluent degradation in municipal and industrial plants.',
        'keywords' => 'bacterial culture, RAYBACT, biological wastewater treatment, Raybon Chemicals',
        'h1' => 'Bacterial Culture',
        'image' => 'images/ProductImages/Bacterial_Culture.jpg',
        'product' => [
            'name' => 'Bacterial Culture',
            'category' => 'Biological Wastewater Treatment',
        ],
    ],
    'water-treatment-chemicals-vadodara' => [
        'title' => 'Water Treatment Chemicals in Vadodara | Raybon Chemicals',
        'description' => 'Polyelectrolytes, antiscalants and effluent treatment chemicals supplied to plants across Nandesari, Makarpura and the Vadodara petrochemical belt. Based in Akota, Vadodara since 1994.',
        'keywords' => 'water treatment chemicals Vadodara, polyelectrolyte supplier Vadodara, effluent treatment chemicals Vadodara, Nandesari GIDC, Makarpura GIDC, ETP chemicals Gujarat',
        'h1' => 'Water Treatment Chemicals in Vadodara',
        'image' => 'images/ProductImages/Polyelectrolytes.jpg',
        'area_served' => ['city' => 'Vadodara', 'region' => 'Gujarat', 'service' => 'Water and Wastewater Treatment Chemicals in Vadodara'],
    ],
    'water-treatment-chemicals-ankleshwar' => [
        'title' => 'Water Treatment Chemicals in Ankleshwar | Raybon Chemicals',
        'description' => 'Polyelectrolytes, MEE and RO antiscalants and ZLD chemistry for chemical plants across Ankleshwar, Panoli and Jhagadia. Supplied from Vadodara with on-site technical support.',
        'keywords' => 'water treatment chemicals Ankleshwar, polyelectrolyte supplier Ankleshwar, MEE antiscalant Ankleshwar, ZLD chemicals Gujarat, Panoli, Jhagadia, GIDC Ankleshwar',
        'h1' => 'Water Treatment Chemicals in Ankleshwar',
        'image' => 'images/ProductImages/MEE.jpg',
        'area_served' => ['city' => 'Ankleshwar', 'region' => 'Gujarat', 'service' => 'Water and Wastewater Treatment Chemicals in Ankleshwar'],
    ],
    'water-treatment-chemicals-vapi' => [
        'title' => 'Water Treatment Chemicals in Vapi | Raybon Chemicals',
        'description' => 'Effluent treatment chemicals for dye, pharma, pesticide and textile plants in Vapi and Sarigam. Colour removal, dewatering polymers and foam control for CETP compliance.',
        'keywords' => 'water treatment chemicals Vapi, polyelectrolyte supplier Vapi, effluent treatment Vapi, colour removal Vapi, Sarigam GIDC, CETP Vapi',
        'h1' => 'Water Treatment Chemicals in Vapi',
        'image' => 'images/ProductImages/Polyelectrolytes.jpg',
        'area_served' => ['city' => 'Vapi', 'region' => 'Gujarat', 'service' => 'Water and Wastewater Treatment Chemicals in Vapi'],
    ],
    'water-treatment-chemicals-ahmedabad' => [
        'title' => 'Water Treatment Chemicals in Ahmedabad | Raybon Chemicals',
        'description' => 'Effluent treatment chemicals for plants across Vatva, Naroda, Odhav and Narol — colour removal for textile and dye effluent, anionic polymers for foundry and engineering sludge.',
        'keywords' => 'water treatment chemicals Ahmedabad, polyelectrolyte supplier Ahmedabad, effluent treatment Ahmedabad, Vatva GIDC, Naroda GIDC, Odhav, textile effluent',
        'h1' => 'Water Treatment Chemicals in Ahmedabad',
        'image' => 'images/ProductImages/Polyelectrolytes.jpg',
        'area_served' => ['city' => 'Ahmedabad', 'region' => 'Gujarat', 'service' => 'Water and Wastewater Treatment Chemicals in Ahmedabad'],
    ],
    'water-treatment-chemicals-surat' => [
        'title' => 'Water Treatment Chemicals in Surat | Raybon Chemicals',
        'description' => 'Colour removal, dewatering polymers and foam control for textile dyeing effluent across Pandesara, Sachin and Hazira. Supplied from Vadodara with on-site jar testing.',
        'keywords' => 'water treatment chemicals Surat, polyelectrolyte supplier Surat, textile effluent treatment Surat, colour removal Surat, Pandesara, Sachin GIDC, Hazira',
        'h1' => 'Water Treatment Chemicals in Surat',
        'image' => 'images/ProductImages/Polyelectrolytes.jpg',
        'area_served' => ['city' => 'Surat', 'region' => 'Gujarat', 'service' => 'Water and Wastewater Treatment Chemicals in Surat'],
    ],
    'etp-chemicals' => [
        'title' => 'ETP Chemicals for Effluent Treatment Plants | Raybon Chemicals',
        'description' => 'Chemicals for every stage of an effluent treatment plant — collection, equalization, neutralization, flash mixer, flocculation, clarifiers and aeration. Coagulants, polyelectrolytes, cultures and defoamers.',
        'keywords' => 'ETP chemicals, effluent treatment plant, collection tank, equalization tank, neutralization tank, flocculation tank, flash mixer, primary clarifier, aeration tank, secondary clarifier, tertiary clarifier, dosing pumps',
        'h1' => 'ETP Chemicals for Effluent Treatment Plants',
        'image' => 'images/ProductImages/Polyelectrolytes.jpg',
        'product' => ['name' => 'ETP Treatment Chemicals', 'category' => 'Effluent Treatment Chemicals'],
    ],
    'stp-chemicals' => [
        'title' => 'STP Chemicals for Sewage Treatment Plants | Raybon Chemicals',
        'description' => 'Chemicals for sewage treatment plants — bacterial cultures, defoamers, dewatering polymers and odour control for aerobic treatment, anaerobic treatment and biogas plants.',
        'keywords' => 'STP chemicals, sewage treatment plant, aerobic treatment, anaerobic treatment, biogas plant, sludge dewatering, bacterial culture, odour control',
        'h1' => 'STP Chemicals for Sewage Treatment Plants',
        'image' => 'images/ProductImages/Polyelectrolytes.jpg',
        'product' => ['name' => 'STP Treatment Chemicals', 'category' => 'Sewage Treatment Chemicals'],
    ],
    'zld-chemicals' => [
        'title' => 'ZLD Chemicals — Zero Liquid Discharge | Raybon Chemicals',
        'description' => 'Chemicals for zero liquid discharge plants across RO, reject RO, MEE, MVR and ATFD stages. Antiscalants and antifoam engineered for the high concentration factors a ZLD train imposes.',
        'keywords' => 'ZLD, zero liquid discharge, ZLD chemicals, MEE, MVR, ATFD, reject RO, brine concentrator, crystalliser, antiscalant',
        'h1' => 'Zero Liquid Discharge (ZLD) Chemicals',
        'image' => 'images/ProductImages/MEE.jpg',
        'product' => ['name' => 'ZLD Treatment Chemicals', 'category' => 'Evaporator Treatment Chemicals'],
    ],
    'wtp-chemicals' => [
        'title' => 'WTP Chemicals, DM Plant & Softener | Raybon Chemicals',
        'description' => 'Water treatment plant chemicals for clarification, sand and carbon filtration, softener and DM plant duty. Potable and food-grade approved grades available.',
        'keywords' => 'WTP, water treatment plant, DM plant, demineralisation, softener, sand filter, carbon filter, degasser, clarification, raw water treatment',
        'h1' => 'Water Treatment Plant (WTP) Chemicals',
        'image' => 'images/ProductImages/RO.jpg',
        'product' => ['name' => 'Water Treatment Plant Chemicals', 'category' => 'Water Treatment Chemicals'],
    ],
    'polyelectrolyte-dosing-system' => [
        'title' => 'Polyelectrolyte Dosing System & Solution Preparation | Raybon Chemicals',
        'description' => 'Automatic polyelectrolyte solution preparation and dosing systems. Controlled wetting, correct make-up concentration and proper ageing so the polymer delivers the performance you paid for.',
        'keywords' => 'polyelectrolyte dosing system, polymer preparation unit, auto dosing system, solution preparation tank, dosing pumps, polymer make-up, chemical dosing system',
        'h1' => 'Polyelectrolyte Solution Preparation and Auto Dosing Systems',
        'image' => 'images/ProductImages/Polyelectrolytes.jpg',
        'product' => ['name' => 'Polyelectrolyte Solution Preparation and Dosing System', 'category' => 'Dosing Equipment'],
    ],
    'polyelectrolytes' => [
        'title' => 'Polyelectrolytes for Sludge Dewatering | Raybon Chemicals',
        'description' => 'Cationic, anionic and non-ionic polyelectrolytes for sludge dewatering and effluent treatment. Authorised ZETAG and PRAESTOL distributor in Vadodara, Gujarat.',
        'keywords' => 'polyelectrolytes, flocculant, flocculating agent, settling agent, clarifying agent, thickening agent, DWPE, DOPE, sludge dewatering, sludge thickening, wastewater treatment, ZETAG, PRAESTOL, Raybon Chemicals',
        'h1' => 'Polyelectrolytes',
        'image' => 'images/ProductImages/Polyelectrolytes.jpg',
        'product' => [
            'name' => 'Polyelectrolytes',
            'category' => 'Flocculants and Coagulants',
        ],
    ],
    'cationic-polyelectrolytes' => [
        'title' => 'Cationic Polyelectrolyte for Sludge Dewatering | Raybon Chemicals',
        'description' => 'Cationic polyelectrolytes and flocculants for organic and biological sludge dewatering on decanter centrifuge, belt press and screw press. ZETAG and PRAESTOL grades, supplied across India.',
        'keywords' => 'cationic polyelectrolyte, cationic flocculant, cationic poly, sludge dewatering, bio sludge, decanter, belt press, screw press, ZETAG, PRAESTOL',
        'h1' => 'Cationic Polyelectrolytes',
        'image' => 'images/ProductImages/Polyelectrolytes.jpg',
        'product' => [
            'name' => 'Cationic Polyelectrolyte',
            'category' => 'Flocculants and Coagulants',
        ],
    ],
    'anionic-polyelectrolytes' => [
        'title' => 'Anionic Polyelectrolyte for Inorganic Sludge | Raybon Chemicals',
        'description' => 'Anionic polyelectrolyte and flocculant supplier for lime, gypsum and mineral slurries, clarification, settling and filter press dewatering. ZETAG and PRAESTOL grades, food-grade options available.',
        'keywords' => 'anionic polyelectrolyte, anionic flocculant, anionic flocculent, anionic poly, settling agent, clarifying agent, clarification, lime gypsum slurry, filter press, sludge thickening, mineral processing, ZETAG, PRAESTOL',
        'h1' => 'Anionic Polyelectrolytes',
        'image' => 'images/ProductImages/Polyelectrolytes.jpg',
        'product' => [
            'name' => 'Anionic Polyelectrolyte',
            'category' => 'Flocculants and Coagulants',
        ],
    ],
    'zetag' => [
        'title' => 'ZETAG Flocculant Supplier in India | Raybon Chemicals',
        'description' => 'Authorised distributor of ZETAG cationic and anionic flocculants from Solenis. Powder and emulsion grades for decanter centrifuge, belt press and screw press dewatering. Stock in Vadodara, Gujarat.',
        'keywords' => 'ZETAG, ZETAG flocculant, ZETAG supplier India, Solenis flocculant, cationic flocculant, sludge dewatering polymer',
        'h1' => 'ZETAG Flocculants',
        'image' => 'images/ProductImages/Polyelectrolytes.jpg',
        'product' => [
            'name' => 'ZETAG Flocculants',
            'category' => 'Flocculants and Coagulants',
        ],
    ],
    'praestol' => [
        'title' => 'PRAESTOL Flocculant Supplier in India | Raybon Chemicals',
        'description' => 'Authorised distributor of PRAESTOL cationic, anionic and non-ionic flocculants from Solenis for sludge dewatering, thickening and drinking water clarification.',
        'keywords' => 'PRAESTOL, PRAESTOL flocculant, PRAESTOL supplier India, Solenis, polyelectrolyte, sludge dewatering',
        'h1' => 'PRAESTOL Flocculants',
        'image' => 'images/ProductImages/Polyelectrolytes.jpg',
        'product' => [
            'name' => 'PRAESTOL Flocculants',
            'category' => 'Flocculants and Coagulants',
        ],
    ],
    'magnafloc' => [
        'title' => 'MAGNAFLOC Flocculant Supplier in India | Raybon Chemicals',
        'description' => 'MAGNAFLOC cationic and anionic flocculants for sludge dewatering, thickening, clarification and mineral processing. Supplied across India from Vadodara, Gujarat.',
        'keywords' => 'MAGNAFLOC, MAGNAFLOC flocculant, MAGNAFLOC supplier India, anionic flocculant, mineral processing, sludge dewatering',
        'h1' => 'MAGNAFLOC Flocculants',
        'image' => 'images/ProductImages/Polyelectrolytes.jpg',
        'product' => [
            'name' => 'MAGNAFLOC Flocculants',
            'category' => 'Flocculants and Coagulants',
        ],
    ],
    'flocculant-cross-reference' => [
        'title' => 'Flocculant Cross-Reference & Equivalent Grades | Raybon Chemicals',
        'description' => 'Switching flocculant supplier? We cross-reference Flopam, Kemfloc, Nalcolyte and other polyelectrolyte brands to equivalent ZETAG and PRAESTOL grades, confirmed by jar testing on your sludge.',
        'keywords' => 'flocculant cross reference, polyelectrolyte equivalent, Flopam alternative, Kemfloc alternative, Nalcolyte alternative, Sudfloc alternative, flocculant substitute India, ZETAG equivalent, PRAESTOL equivalent',
        'h1' => 'Flocculant Cross-Reference Guide',
        'image' => 'images/ProductImages/Polyelectrolytes.jpg',
    ],
    'filter-press' => [
        'title' => 'Polyelectrolyte for Filter Press Dewatering | Raybon Chemicals',
        'description' => 'Flocculants and coagulants for plate-and-frame and membrane filter press dewatering. Grade selection, cloth blinding troubleshooting and jar testing support.',
        'keywords' => 'filter press, filter press polyelectrolyte, filter press flocculant, plate and frame, sludge dewatering, cloth blinding',
        'h1' => 'Polyelectrolyte for Filter Press',
        'image' => 'images/ProductImages/Polyelectrolytes.jpg',
        'product' => [
            'name' => 'Filter Press Polyelectrolyte',
            'category' => 'Flocculants and Coagulants',
        ],
    ],
    'sludge-thickening' => [
        'title' => 'Sludge Thickening Polyelectrolytes | Raybon Chemicals',
        'description' => 'Thickening polyelectrolytes for gravity thickeners, gravity belt and rotary drum thickeners and DAF units. Raise feed solids and cut downstream dewatering cost.',
        'keywords' => 'sludge thickening, gravity belt thickener, rotary drum thickener, DAF, thickening polymer, polyelectrolyte',
        'h1' => 'Sludge Thickening Polyelectrolytes',
        'image' => 'images/ProductImages/Polyelectrolytes.jpg',
        'product' => [
            'name' => 'Sludge Thickening Polyelectrolyte',
            'category' => 'Flocculants and Coagulants',
        ],
    ],
    'portfolio-details-03' => [
        'title' => 'Polyelectrolytes for Wastewater Treatment | Raybon Chemicals',
        'description' => 'High-performance polyelectrolytes for sludge dewatering and effluent treatment. Cationic, anionic, and non-ionic polymers with lower dosage and higher cake solids.',
        'keywords' => 'polyelectrolytes, flocculants, sludge dewatering, wastewater treatment, Raybon Chemicals',
        'h1' => 'Polyelectrolytes',
        'image' => 'images/ProductImages/Polyelectrolytes.jpg',
        'product' => [
            'name' => 'Polyelectrolytes',
            'category' => 'Flocculants and Coagulants',
        ],
    ],
    'mee-antiscalant' => [
        'title' => 'MEE Antiscalant & Evaporator Antifoam | Raybon Chemicals',
        'description' => 'Antiscalants and antifoam for multi effect evaporator, MVR and thermal desalination plants. NSF and Kiwa certified, food grade options. Prevent scaling and COD carryover.',
        'keywords' => 'MEE antiscalant, multi effect evaporator, multiple effect evaporator, MVR, thermal desalination, evaporator antiscalant, NSF certified, Kiwa certified, food grade antiscalant, drinking water grade, Sokalan',
        'h1' => 'MEE Antiscalants and Antifoam',
        'image' => 'images/ProductImages/MEE.jpg',
        'product' => [
            'name' => 'MEE Antiscalant and Antifoam',
            'category' => 'Evaporator Treatment Chemicals',
        ],
    ],
    'defoamer' => [
        'title' => 'Defoamer & Antifoaming Agent Supplier in India | Raybon Chemicals',
        'description' => 'Silicone and non-silicone defoamers and antifoaming agents for aerobic and anaerobic treatment, evaporators and paper mills. NSF and Kiwa certified, food grade defoamer available.',
        'keywords' => 'defoamer, antifoam, antifoaming agent, defoaming agent, silicone defoamer, non-silicone defoamer, food grade defoamer, NSF certified, Kiwa certified, aerobic treatment, anaerobic treatment, Antispumin, Afranil',
        'h1' => 'Defoamer and Antifoaming Agent',
        'image' => 'images/ProductImages/deformerTank.jpg',
        'product' => [
            'name' => 'Defoamer and Antifoaming Agent',
            'category' => 'Foam Control Chemicals',
        ],
    ],
    'antispumin' => [
        'title' => 'Antispumin Defoamer Supplier in India | Raybon Chemicals',
        'description' => 'Antispumin defoamers from Solenis for wastewater foam control in aeration tanks, digesters and industrial effluent. Silicone-free grades available for membrane plants.',
        'keywords' => 'Antispumin, Antispumin defoamer, Solenis defoamer, antifoam, wastewater foam control, aeration tank',
        'h1' => 'Antispumin Defoamers',
        'image' => 'images/ProductImages/deformerTank.jpg',
        'product' => [
            'name' => 'Antispumin Defoamers',
            'category' => 'Foam Control Chemicals',
        ],
    ],
    'afranil' => [
        'title' => 'Afranil Antifoam Supplier in India | Raybon Chemicals',
        'description' => 'Afranil water-based biodegradable antifoam for aeration tanks and paper mills, including silicone-free Afranil MTC. Controls foam without inhibiting biomass activity.',
        'keywords' => 'Afranil, Afranil MTC, antifoam, silicone free antifoam, aeration tank defoamer, biodegradable defoamer, paper mill antifoam',
        'h1' => 'Afranil Antifoam',
        'image' => 'images/ProductImages/deformerTank.jpg',
        'product' => [
            'name' => 'Afranil Antifoam',
            'category' => 'Foam Control Chemicals',
        ],
    ],
    'portfolio-details-04' => [
        'title' => 'MEE Antiscalants & Antifoam | Raybon Chemicals',
        'description' => 'Antiscalants and antifoam for Multiple Effect Evaporator (MEE) plants. Prevent scale formation, reduce cleaning downtime, and improve heat transfer efficiency.',
        'keywords' => 'MEE antiscalant, multiple effect evaporator, Sokalan, antifoam, Raybon Chemicals',
        'h1' => 'MEE Antiscalants and Antifoam',
        'image' => 'images/ProductImages/MEE.jpg',
        'product' => [
            'name' => 'MEE Antiscalant and Antifoam',
            'category' => 'Evaporator Treatment Chemicals',
        ],
    ],
    'ro-antiscalant' => [
        'title' => 'RO Antiscalant Supplier in India | Raybon Chemicals',
        'description' => 'Reverse osmosis antiscalants for silica, hardness, carbonate and sulphate scale control. NSF certified grades, Sokalan and Ameroyal ranges, supplied across India from Vadodara.',
        'keywords' => 'RO antiscalant, reverse osmosis antiscalant, membrane antiscalant, NSF antiscalant, silica scaling, RO fouling, hardness, TDS, Sokalan, Ameroyal',
        'h1' => 'RO Antiscalant and Cleaning Chemicals',
        'image' => 'images/ProductImages/RO.jpg',
        'product' => [
            'name' => 'RO Antiscalant and Cleaning Chemicals',
            'category' => 'Membrane Treatment Chemicals',
        ],
    ],
    'sokalan' => [
        'title' => 'Sokalan RO Antiscalant Supplier in India | Raybon Chemicals',
        'description' => 'Sokalan RO antiscalants for reverse osmosis scale control, including Sokalan RO 3000 and RO 3500 for silica scaling. Compatible with all major thin film composite membranes.',
        'keywords' => 'Sokalan, Sokalan RO, Sokalan RO 3000, Sokalan RO 3500, RO antiscalant, membrane antiscalant, silica scale, reverse osmosis',
        'h1' => 'Sokalan RO Antiscalants',
        'image' => 'images/ProductImages/RO.jpg',
        'product' => [
            'name' => 'Sokalan RO Antiscalants',
            'category' => 'Membrane Treatment Chemicals',
        ],
    ],
    'ameroyal' => [
        'title' => 'Ameroyal Antiscalant Supplier in India | Raybon Chemicals',
        'description' => 'Ameroyal reverse osmosis antiscalants from Solenis, including Ameroyal 710, for scale and fouling control on RO and nanofiltration membranes. Supplied across India.',
        'keywords' => 'Ameroyal, Ameroyal 710, Solenis antiscalant, RO antiscalant, membrane antiscalant, reverse osmosis, nanofiltration',
        'h1' => 'Ameroyal Antiscalants',
        'image' => 'images/ProductImages/RO.jpg',
        'product' => [
            'name' => 'Ameroyal Antiscalants',
            'category' => 'Membrane Treatment Chemicals',
        ],
    ],
    'ro-antiscalant-cross-reference' => [
        'title' => 'RO Antiscalant Cross-Reference & Equivalents | Raybon Chemicals',
        'description' => 'Changing RO antiscalant supplier? We cross-reference Hypersperse, Flocon, Vitec, Permatreat, Genesys and other membrane antiscalants to equivalent Sokalan and Ameroyal grades.',
        'keywords' => 'RO antiscalant cross reference, antiscalant equivalent, Hypersperse alternative, Flocon alternative, Vitec alternative, Permatreat alternative, membrane antiscalant substitute India',
        'h1' => 'RO Antiscalant Cross-Reference Guide',
        'image' => 'images/ProductImages/RO.jpg',
    ],
    'portfolio-details-05' => [
        'title' => 'RO Antiscalant & Cleaning Chemicals | Raybon Chemicals',
        'description' => 'Sokalan RO antiscalants and membrane cleaning chemicals to prevent scaling on reverse osmosis membranes and restore plant performance.',
        'keywords' => 'RO antiscalant, reverse osmosis, membrane cleaning, Sokalan, Raybon Chemicals',
        'h1' => 'RO Antiscalant and Cleaning Chemicals',
        'image' => 'images/ProductImages/RO.jpg',
        'product' => [
            'name' => 'RO Antiscalant and Cleaning Chemicals',
            'category' => 'Membrane Treatment Chemicals',
        ],
    ],
    'portfolio-details-06' => [
        'title' => 'Defoamer for Aeration Tanks | Raybon Chemicals',
        'description' => 'AFRANIL biodegradable defoamers for aeration tanks and paper mills. Control foam without inhibiting biomass activity or reducing oxygenation capacity.',
        'keywords' => 'defoamer, aeration tank, AFRANIL, foam control, Raybon Chemicals',
        'h1' => 'Defoamer for Aeration Tank',
        'image' => 'images/ProductImages/deformerTank.jpg',
        'product' => [
            'name' => 'Defoamer for Aeration Tanks',
            'category' => 'Foam Control Chemicals',
        ],
    ],
    'volute-screw-press' => [
        'title' => 'Volute Screw Press Dewatering | Raybon Chemicals',
        'description' => 'Polyelectrolyte solutions optimized for volute screw press sludge dewatering. Reduce moisture content, improve throughput, and lower disposal costs.',
        'keywords' => 'volute screw press, sludge dewatering, polyelectrolytes, Raybon Chemicals',
        'h1' => 'Volute Screw Press',
        'image' => 'images/ProductImages/Picture 7.png',
        'product' => [
            'name' => 'Volute Screw Press Dewatering Polymers',
            'category' => 'Sludge Dewatering',
        ],
    ],
    'decanter-centrifuge' => [
        'title' => 'Decanter Centrifuge Dewatering | Raybon Chemicals',
        'description' => 'Chemical conditioning for decanter centrifuge sludge dewatering. Raybon polyelectrolytes for efficient solids separation and improved centrate quality.',
        'keywords' => 'decanter centrifuge, sludge dewatering, polyelectrolytes, Raybon Chemicals',
        'h1' => 'Decanter Centrifuge',
        'image' => 'images/ProductImages/Picture 1.png',
        'product' => [
            'name' => 'Decanter Centrifuge Dewatering Polymers',
            'category' => 'Sludge Dewatering',
        ],
    ],
    'belt-press' => [
        'title' => 'Belt Press Sludge Dewatering | Raybon Chemicals',
        'description' => 'Coagulants and flocculants for belt press and monobelt sludge dewatering. Improve cake dryness and reduce polymer consumption with Raybon Chemicals.',
        'keywords' => 'belt press, sludge dewatering, coagulants, flocculants, Raybon Chemicals',
        'h1' => 'Belt Press',
        'image' => 'images/ProductImages/Picture 5.png',
        'product' => [
            'name' => 'Belt Press Dewatering Polymers',
            'category' => 'Sludge Dewatering',
        ],
    ],
    'boiler-treatment-chemicals' => [
        'title' => 'Boiler Water Treatment Chemicals | Raybon Chemicals',
        'description' => 'Boiler water treatment chemicals to prevent corrosion, scale, and fouling. Maximize system reliability and protect assets with Raybon Chemicals field support.',
        'keywords' => 'boiler water treatment, boiler chemicals, corrosion inhibition, Raybon Chemicals',
        'h1' => 'Boiler Water Treatment Chemicals',
        'image' => 'images/ProductImages/Boiler Water Treatment1.jpg',
        'product' => [
            'name' => 'Boiler Water Treatment Chemicals',
            'category' => 'Utility Water Treatment Chemicals',
        ],
    ],
    'cooling-tower-water-treatment-chemicals' => [
        'title' => 'Cooling Tower Water Treatment Chemicals | Raybon Chemicals',
        'description' => 'Cooling tower water treatment chemicals for scale control, corrosion inhibition, and microbiological protection. Reliable cooling system operation from Raybon Chemicals.',
        'keywords' => 'cooling tower water treatment, cooling water chemicals, corrosion inhibition, Raybon Chemicals',
        'h1' => 'Cooling Tower Water Treatment Chemicals',
        'image' => 'images/ProductImages/Cooling Tower1.jpg',
        'product' => [
            'name' => 'Cooling Tower Water Treatment Chemicals',
            'category' => 'Utility Water Treatment Chemicals',
        ],
    ],
    'odour-control-chemicals' => [
        'title' => 'Odour Control Chemicals | Raybon Chemicals',
        'description' => 'Odour control chemicals for wastewater and industrial applications. Contact Raybon Chemicals in Vadodara for product availability and custom treatment solutions.',
        'keywords' => 'odour control chemicals, wastewater odour, industrial odour treatment, Raybon Chemicals',
        'h1' => 'Odour Control Chemicals',
        'image' => 'contact_files/Odour Control.jpg',
        'product' => [
            'name' => 'Odour Control Chemicals',
            'category' => 'Wastewater Treatment Chemicals',
        ],
    ],
    'color-removing-chemicals' => [
        'title' => 'Colour Removing Chemicals | Raybon Chemicals',
        'description' => 'Colour removing chemicals for textile and industrial wastewater treatment. Contact Raybon Chemicals for decolourization solutions and product information.',
        'keywords' => 'colour removing chemicals, textile wastewater, decolourization, Raybon Chemicals',
        'h1' => 'Colour Removing Chemicals',
        'image' => 'contact_files/Colour Removing Chemical.jpg',
        'product' => [
            'name' => 'Colour Removing Chemicals',
            'category' => 'Wastewater Treatment Chemicals',
        ],
    ],
];

if (!isset($page_key) || !isset($page_meta_registry[$page_key])) {
    $page_key = 'index';
}

$page_meta = $page_meta_registry[$page_key];

// Overlay translated title/description/keywords/h1 where lang/<lang>.php has
// them. Anything untranslated falls back to the English registry entry above,
// so a half-translated site still renders correct <title> tags.
foreach (array('title', 'description', 'keywords', 'h1') as $rb_field) {
    if (!isset($page_meta[$rb_field])) {
        continue;
    }
    $page_meta[$rb_field] = t('meta.' . $page_key . '.' . $rb_field, $page_meta[$rb_field]);
}
unset($rb_field);

function page_h1($class = 'title')
{
    global $page_meta;

    if (empty($page_meta['h1'])) {
        return;
    }

    $heading = htmlspecialchars($page_meta['h1'], ENT_QUOTES, 'UTF-8');
    $classAttr = htmlspecialchars($class, ENT_QUOTES, 'UTF-8');

    echo '<h1 class="' . $classAttr . '">' . $heading . '</h1>';
}
