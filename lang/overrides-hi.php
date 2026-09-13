<?php
// =============================================================
// Hand-written Hindi corrections. NEVER overwritten by
// tools/translate.php — this file wins over lang/hi.php.
//
// Short UI labels are where machine translation fails hardest: with no
// surrounding sentence the engine picks a dictionary sense that is wrong in
// context. "Products" came back as वाहिकाएँ ("conduits"), "Home" as मूल
// ("root"), "Career" as जीवन-यात्रा ("life journey").
//
// >>> These are standard web-UI terms, but they still need a native speaker
// >>> in the Vadodara office to confirm before this goes live.
// =============================================================

return [

    // ---- Navigation -----------------------------------------
    'nav.home'             => 'होम',
    'nav.products'         => 'उत्पाद',
    'nav.about'            => 'हमारे बारे में',
    'nav.about.overview'   => 'कंपनी परिचय',
    'nav.about.ceo'        => 'सीईओ की कलम से',
    'nav.career'           => 'करियर',
    'nav.contact'          => 'संपर्क करें',
    'nav.call'             => 'फ़ोन',
    'nav.email'            => 'ईमेल',
    'nav.language'         => 'भाषा',
    'nav.download_profile' => 'प्रोफ़ाइल डाउनलोड करें',
    'nav.quick_inquiry'    => 'त्वरित पूछताछ',

    // ---- Footer ---------------------------------------------
    'footer.products.title' => 'हमारे उत्पाद',
    'footer.email.title'    => 'सहायता चाहिए? हमें ईमेल करें',
    'footer.hours.title'    => 'हमारा कार्य समय',

    // ---- Home page ------------------------------------------
    // The engine rendered "Flocculants & Coagulants" as "गाढ़क और गाढ़क" —
    // the same word twice, because it had no term for either.
    'home.hero.1.eyebrow' => 'फ्लॉकुलेंट और कोएगुलेंट',
    'home.hero.5.eyebrow' => 'फोम नियंत्रण',
    'home.why.title'      => 'हमें क्यों <strong>चुनें</strong>',
    'home.why.badge1'     => 'उत्कृष्ट उत्पाद',
    'home.strip.cta'      => 'पूछताछ भेजें',

    // ---- Contact --------------------------------------------
    // "Your Number" became आपका क्रमांक ("serial number").
    'contact.form.phone' => 'आपका फ़ोन नंबर:*',
    'contact.form.title' => 'हमें <strong>संदेश भेजें!</strong>',
    'contact.office.title' => 'हमारे कार्यालय पर आएँ',

    // ---- About ----------------------------------------------
    'about1.title'    => 'परिचय: <strong>Raybon Chemicals</strong>',
    'about2.aims.1'   => 'बेहतर डेटा दृश्यता',
    'about2.aims.2'   => 'बढ़ी हुई उत्पादकता',
    'about2.aims.4'   => 'बेहतर पर्यावरणीय प्रदर्शन',
    'about2.aims.5'   => 'बेहतर लाभप्रदता',
    'about2.aims.6'   => 'बेहतर परिसंपत्ति सुरक्षा',

];
