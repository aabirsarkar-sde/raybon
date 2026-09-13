<?php
// =============================================================
// Hand-written Gujarati corrections. NEVER overwritten by
// tools/translate.php — this file wins over lang/gu.php.
//
// Same failure mode as Hindi: "Products" came back as નળી ("pipe"),
// "Career" as જીવન ("life"), and "Flocculants & Coagulants" as કાદવ ("mud").
// One string (nav.quick_inquiry) even came back with a Gurmukhi/Punjabi
// character mixed into the Gujarati — a clear sign the raw output cannot
// ship unreviewed.
//
// >>> Gujarati is the local language of the Vadodara office. Someone there
// >>> MUST read this file, and lang/gu.php, before it goes live.
// =============================================================

return [

    // ---- Navigation -----------------------------------------
    'nav.home'             => 'હોમ',
    'nav.products'         => 'ઉત્પાદનો',
    'nav.about'            => 'અમારા વિશે',
    'nav.about.overview'   => 'કંપની પરિચય',
    'nav.about.ceo'        => 'સીઈઓની કલમે',
    'nav.career'           => 'કારકિર્દી',
    'nav.contact'          => 'સંપર્ક કરો',
    'nav.call'             => 'ફોન',
    'nav.email'            => 'ઈમેલ',
    'nav.language'         => 'ભાષા',
    'nav.download_profile' => 'પ્રોફાઇલ ડાઉનલોડ કરો',
    'nav.quick_inquiry'    => 'ઝડપી પૂછપરછ',

    // ---- Footer ---------------------------------------------
    'footer.products.title' => 'અમારા ઉત્પાદનો',
    'footer.email.title'    => 'સહાય જોઈએ છે? અમને ઈમેલ કરો',
    'footer.hours.title'    => 'અમારો કાર્ય સમય',

    // ---- Home page ------------------------------------------
    'home.hero.1.eyebrow' => 'ફ્લોક્યુલન્ટ અને કોએગ્યુલન્ટ',
    'home.hero.5.eyebrow' => 'ફોમ નિયંત્રણ',
    'home.why.title'      => 'અમને શા માટે <strong>પસંદ કરો</strong>',
    'home.why.badge1'     => 'ઉત્તમ ઉત્પાદનો',
    'home.strip.cta'      => 'પૂછપરછ મોકલો',

    // ---- Contact --------------------------------------------
    'contact.form.phone'   => 'તમારો ફોન નંબર:*',
    'contact.form.title'   => 'અમને <strong>સંદેશ મોકલો!</strong>',
    'contact.office.title' => 'અમારી ઓફિસે પધારો',

    // ---- About ----------------------------------------------
    'about1.title'  => 'પરિચય: <strong>Raybon Chemicals</strong>',
    'about2.aims.1' => 'બહેતર ડેટા દૃશ્યતા',
    'about2.aims.2' => 'વધેલી ઉત્પાદકતા',
    'about2.aims.4' => 'બહેતર પર્યાવરણીય કામગીરી',
    'about2.aims.5' => 'બહેતર નફાકારકતા',
    'about2.aims.6' => 'બહેતર સંપત્તિ સુરક્ષા',

];
