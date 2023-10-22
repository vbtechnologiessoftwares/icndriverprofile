<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <!-- Font-awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <title>Cascade</title>

    <!-- Favicon -->
  <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="{{ asset('public/images/apple-touch-icon.png')}}"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="{{ asset('public/images/favicon-32x32.png')}}"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="{{ asset('public/images/favicon-16x16.png')}}"
    />
    <link rel="manifest" href="images/site.webmanifest" />
    <meta name="msapplication-TileColor" content="#da532c" />
    <meta name="theme-color" content="#ffffff" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.js"
    ></script>
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.js"
    ></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
    href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css
    rel="stylesheet">

    <!-- External Css file -->
       <link rel="stylesheet" href="{{ asset('public/style.css')}}" />

    <style>
      .progress-bar {
        width: 100%;
        height: 20px;
        background-color: #b3b3df;
        border-radius: 15px;
        position: relative;
        margin-bottom: 20px;
      }

      .progress-bar__steps {
        display: flex;
        justify-content: space-between;
        position: absolute;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        width: 100%;
        height: 100%;
        padding: 0 10px;
      }

      .progress-bar__step {
        width: 20px;
        height: 20px;
        background-color: #384fe9;
        border-radius: 50%;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 16px;
        color: #fff;
      }

      .progress-bar__step.active {
        background-color: rgb(8, 17, 44);
      }

      .progress-bar__step i {
        font-size: 12px;
      }

      .progress-bar__progress {
        height: 100%;
        background-color: rgb(99, 117, 198);
        border-radius: 15px;
        width: 0;
        transition: width 0.8s ease;
      }

      a.btn.btn-primary.next {
        color: #fff;
        background-color: #102870;
        border-color: #0a1a4d;
      }

      a.btn.btn-primary.previous {
        color: #fff;
        background-color: #102870;
        border-color: #0a1a4d;
      }

      select.form-control {
        background-image: linear-gradient(45deg, transparent 50%, gray 50%),
          linear-gradient(135deg, gray 50%, transparent 50%),
          radial-gradient(#ddd 70%, transparent 72%);
        background-position: calc(100% - 20px) calc(1em + 2px),
          calc(100% - 15px) calc(1em + 2px), calc(100% - 0.5em) 0.5em;
        background-size: 5px 5px, 5px 5px, 1.5em 1.5em;
        background-repeat: no-repeat;
      }

      label.col-lg-12.control-label {
        text-align: left;
        margin-bottom: 14px;
        margin-top: 14px;
      }

      form#myform {
        background: #fafafaeb;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;
        position: relative;
      }

      label.col-lg-4.control-label {
        float: left;
      }

      #personal_information,
      #coverage_information,
      #driver_information {
        display: none;
      }

      .navbar-expand-sm .navbar-collapse {
        display: contents !important;
        flex-basis: auto;
      }

      * {
        margin: 0;
        padding: 0;
      }

      html {
        height: 100%;
      }

      #heading {
        text-transform: uppercase;
        color: #673ab7;
        font-weight: normal;
      }

      #msform {
        text-align: center;
        position: relative;
        margin-top: 20px;
      }

      #msform fieldset {
        background: #fafafaeb;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;
        /*stacking fieldsets above each other*/
        position: relative;
      }

      .form-card {
        text-align: left;
      }

      /*Hide all except first fieldset*/
      #msform fieldset:not(:first-of-type) {
        display: none;
      }

      .cc {
        font-size: 60px;
        color: #0e2052;
        font-weight: 700;
        text-align: center;
      }

      .fs-title {
        font-size: 23px;
        color: #000000ad !important;
        margin-bottom: 15px;
        font-weight: 500;
      }

      .steps {
        font-size: 25px;
        color: gray;
        margin-bottom: 10px;
        font-weight: normal;
        text-align: right;
      }

      #auto_coverage_background {
        background-image: url("{{ asset('image/bg-auto.jpg') }}");
        background-size: cover;
        background-repeat: no-repeat;
        padding-top: 1rem;
        max-width: 100%;
        background-size: 100% 100%;
      }
    </style>
  </head>

  <body>
    <!-- Section one Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light mb-5">
      <div class="container-fluid" style="padding: 0 4rem" id="top-nav">
        <a class="navbar-brand" href="{{ url('/') }}">
          <img src="{{ asset('public/images/logo2.png')}}" alt="logo" class="logo-img img-fluid" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <!-- <a class="nav-link active" aria-current="page" href="#"></a> -->
            </li>
          </ul>
          <div class="d-flex">
            <ul class="navbar-nav me-4 mb-2 mb-lg-0">
              <li class="nav-item" style="margin-right: 10px">
                <a
                  class="nav-link active fs-5 fw-bold"
                  aria-current="page"
                  href="{{ route('auto-coverage') }}"
                  >Auto Coverage</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link active fs-5 fw-bold" href="{{ route('helth-coverage') }}"
                  >Health Coverage</a
                >
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- Section three -->
    <div class="container-fluid" id="">
 <div class="container-fluid">  

<div class="container">
<h2>Privacy Policy</h2>
<p>Last Update&nbsp;jan 24, 2023</p>
<p><a href="https://www.cascadecoverage.com/terms">Click here to view the Terms Of Service</a></p>
<p>Thank you for visiting cascadecoverage.com&nbsp;(“Website”) which is operated by Partners Edge LLC (“Company”). We respect your privacy in handling Personal Information relating to you and your use of any of our websites, including this one. Company does business primarily in the United States, though it may have partners or providers who operated their businesses in Canada. “Personal Information” may include any information that can be used to identify or locate you, such as your name, address, IP address, mailing address, contact information, email address or phone number and other information you may produce to us. Personal Information is defined in both federal and state law in the United States, and in the laws of Canada. This Privacy Policy is intended to include the definition most applicable to your geographic location. Please recognize that your rights related to Personal Information, and what Personal Information is, differs somewhat from state to state and country to country. For example, a California resident likely has different rights than a Utah resident, and each of them likely have different rights than a resident of Canada.</p>
<p>By using or accessing the Website in any way, or by transacting with Company through any other means, you acknowledge that you accept the practices and policies outlined in this&nbsp;<em>Privacy Policy</em>, and you hereby consent to our collection, use and disclosure of your information in the manner described herein.</p>
<p>Please read this&nbsp;<em>Privacy Policy</em>&nbsp;carefully in order to understand what information Company collects, and how Company uses that information. If you do not agree with the&nbsp;<em>Privacy Policy</em>, please do not use this Website or transact with the company in any way. We encourage you to check our Website frequently to see the current&nbsp;<em>Privacy Policy</em>&nbsp;and&nbsp;<a href="https://www.cascadecoverage.com/terms"><em>Terms and Conditions</em></a>&nbsp;in effect and any changes that may have been made to them. If we make material changes to this&nbsp;<em>Privacy Policy</em>&nbsp;we will post the revised&nbsp;<em>Privacy Policy</em>&nbsp;and the revised effective date on this Website. If you use the Website after any changes to the&nbsp;<em>Privacy Policy</em>&nbsp;have been posted, this means you agree to all of the changes. This&nbsp;<em>Privacy Policy</em>&nbsp;is part of our&nbsp;<a href="https://www.cascadecoverage.com/terms"><em>Terms and Conditions</em></a>.</p>
<ol>
<li><strong>What We Collect and How We Collect It</strong></li>
</ol>
<p>We may collect Personal Information that you provide us when you access our website, transact with us through the website or otherwise, contact customer service, participate in a survey or promotion, participate in another feature of our Website that requires your Personal Information, provide us with comments, suggestions or content for testimonials, endorsements, social media and/or blog posts, and/or provide your information to third party marketing affiliates. We only collect information that is necessary for the purposes identified herein. Please note that we do not control the collection or use of your information by third parties who may provide it to us, and such is subject to their privacy policies.</p>
<p>Some of our data and information collection is completely transparent. This means that you will know when and how it is happening. We can only gather the information you voluntarily provide. If you object to or limit our processing of certain information of this nature, you may not be able to use all of the features of the Website, interact or transact with Company at all. By providing us with this information, you expressly agree to our collection, use, storage, and disclosure of it as explained in this&nbsp;<em>Privacy Policy</em>. This type of information includes, but is not necessarily limited to:</p>
<ul>
<li>Contact Information: Such as name, address, phone number, email address.</li>
<li>Preferences: Such as types of offers, products, policies and plans, or amounts of coverage in the context of insurance.</li>
<li>Other Personal Data: Such as gender, income range, general health information, date of birth, height, weight.</li>
<li>Questions, Comments and Feedback: You have the ability to contact us with questions you may have, inquire about products or offers, request to be contacted, provide us with comments and or feedback about the Company and products. We will process any information you submit, post or provide in the course of such activities to respond to your comments or feedback.</li>
</ul>
<p>Our collection of other data and information may happen without your express knowledge, but you hereby consent to it. This means that you will not necessarily know when and how it is happening. However, we can only gather the information through your voluntary interactions with us. If you object to, or limit our processing of certain information of this nature, you may not be able to use all of the features of the Website, interact or transact with Company at all. By providing us with this information, you expressly agree to our collection, use, storage, and disclosure of it as explained in this&nbsp;<em>Privacy Policy</em>. This type of information includes, but is not necessary limited to:</p>
<ul>
<li>Information from Third Party Platforms:If you access the Website or communicate with us using your account or account credentials from a third-party owned or operated platform/service (e.g., Amazon, Apple, AWS, Facebook, Google, Twitter, etc.), post content from our Website to a social network, or use various social media features (e.g., “Like” button), we may process certain information from the third parties, such as your username, “likes”, location, birthday, comments and reviews, preferences, network reach and influence, and any other information you provided to the third parties in connection with your account. Depending on your account and privacy settings, we may also be able to see information that you post when using these third parties whether or not you are using our services. We may also collect Personal Information about you from our third party service providers who provide us with e-commerce and/or technical assistance associated with functionality and purposes of the Website. The information you post or provide to third parties, as well as the controls surrounding these disclosures are governed by the policies of these third parties.</li>
<li>Browsing Information, Logs, Device Information:When you visit our Website, we may process information about your activities on our Website through the use of technology such as cookies, web beacons, IP Address, and other tracking technologies, as further explained herein below. This information may contain personal information and statistical information. We may collect device-specific information (such as hardware model, operating system version, unique device identifiers, and mobile network Information, including your mobile phone number). We may record or log information from your Devices, their software, and your activity in accessing or using our Website. This information may include: IP address, device ID numbers, system activity, location preferences, date and time stamps of transactions. Providing this information is not mandatory and cookies can be disabled. However, please note that our Website may not offer the same functionalities when certain cookies or other tracking data are disabled.</li>
</ul>
<p>A cookie is a tiny element of data that our Websites can send to your browser, which may then be stored on your hard drive so we can recognize your computer when you return. Cookies also assist with performance of various aspects of the Website. You may set your Web browser to notify you when you receive a cookie. However, should you decide not to accept cookies from our Website, you may limit the functionality we can provide when you visit our Website. Additional general information about cookies and how they work is available at&nbsp;<a href="http://www.allaboutcookies.org/">www.allaboutcookies.org</a>. More information regarding cookies is also provided at the end of this document.</p>
<p>A web beacon (also known as a “tracking pixel” or “clear GIF”) is a clear graphic image (typically a one-pixel tag) that is delivered through a web browser or HTML e-mail, typically in conjunction with a cookie. Web beacons allows us, for example, to monitor how users move from one page within our websites to another, to track access to our communications, to understand whether users have come to our websites from an online advertisement displayed on a third-party website, to measure how ads have been viewed, and to improve site performance.</p>
<p>If we are unable to associate the information collected from you or your devices to you, as some may be purely statistical or technical without any identifier or connection to you, such is not considered personal information for purposes of this&nbsp;<em>Privacy Policy</em>. For example, you may use a computer to navigate to the Website, and the Website may record an entry to the Website by a personal computer running Windows 10. This information has no direct link to you and cannot be associated with you and is therefore not considered Personal Information.</p>
<ol start="2">
<li><strong>How We Use It</strong></li>
</ol>
<p>This Website has the primary purpose of generated sales leads that we share with, or sell to, third parties. With this purpose in mind, we may process your Personal Information (depending on your interaction with us) for any reason that is permitted under data protection laws and in accordance with this&nbsp;<em>Privacy Policy</em>. We will, and you grant us permission to, disclose your Personal Information to third parties as follows:</p>
<ul>
<li>To sell to, or share with, interested third parties who may contact you with a sales purpose.</li>
<li>To sell to, or share with, third party data compilers who in turn share or sell the data to interested third parties who may contact you with a sales purpose.</li>
<li>If required or permitted to do so by law or if, in good faith, Company believes that such action is necessary to: (1) comply with the law or with legal process; (2) protect and defend Company’s rights and property or prevent fraud; (3) protect Company against abuse, misuse or unauthorized use Company’s products or services; (4) protect the personal safety or property of its personnel, users of the Website or the public, and/or (5) comply with tax reporting requirements. The servers that serve the Website automatically identify a computer by its IP address.</li>
<li>If the information is non-personal information (from which individuals cannot be identified, and which do not relate to individuals) in aggregate form, and the disclosure is for business purposes, such as consultants and advisors to Company.</li>
<li>If Company, in good faith, determines that you have used the service to menace, threaten, harass, intimidate or otherwise deceptively pose as another person, or in any other way in violation of law. Simply, if you attempt to use the Website for any unlawful means, you have no expectation of privacy.</li>
<li>If a third partyacquires all or substantially all of the assets of, or ownership interest in, Company whether by merger, acquisition, reorganization or otherwise, Company may transfer its database, including Personal Information contained therein, to the third party.</li>
</ul>
<p>We would like to inform you of products and services, sales and special offers that might benefit you. When you register online, you may have the opportunity to sign up for e-mails and other electronic promotions (e.g., SMS and text messages) about our products, services, sales and special offers. If you would like to stop receiving such promotional information from Company, please follow the steps provided in Section 5 of this&nbsp;<em>Privacy Policy</em>.</p>
<p>We may also collect, use and disclose personal information you provide in order to contact you; respond to your inquiries and provide you with relevant information from time to time; provide services and products requested by you; administer or otherwise carry out our obligations in relation to any agreement you have with us; compile statistics for analytical and marketing purposes; and, any other purposes about which we inform you when we ask you for information.</p>
<p>Company also uses Personal Information to continually assess and improve the Website and the products and services we offer. To serve you better, we may combine the Personal Information that you give us with publicly available information and information we receive from or cross- reference with our marketing partners and others.</p>
<p>Some of our operations, such as website administration, technical support, and/or electronic commerce, may be managed by third parties unaffiliated with Company. These companies may share Personal Information with their affiliates and with service providers whom they engage to perform services related to our Website or the operation of our business.</p>
<ol start="3">
<li><strong>How We Protect It</strong></li>
</ol>
<p>Company stores all information in state of the art cloud storage in association with AWS. In doing so, Company uses appropriate physical, organizational and technological measures to protect the personal information you provide to us against loss or theft, and unauthorized access, disclosure, copying, use, or modification. This includes limiting access on a “need-to-know” basis. However, no electronic data transmission can be guaranteed to be secure from access by unintended recipients and Company will not be responsible for any breach of security unless this breach is due to its own gross negligence. Although we are committed to employing reasonable technology in order to protect the security of our Website, even with the best technology, no website is 100% secure. In transacting with us through the website, you assume the risk inherent in transacting online.</p>
<p>This&nbsp;<em>Privacy Policy</em>&nbsp;only applies to Company and in particular, the Website. The Website may include links to the websites of our business partners, vendors and advertisers, as examples. These other sites are outside of our control. Please be aware that these websites may collect information about you, and operate according to their own privacy practices which may differ from those contained in this&nbsp;<em>Privacy Policy</em>. Company encourages users to be aware when you leave this Website and to read the privacy statements of each website you visit that collects personal information. While Company carefully chooses the websites to link to, this&nbsp;<em>Privacy Policy</em>&nbsp;applies solely to information collected on this Website.</p>
<p>As a general rule, we only maintain data for up to 2 years. However, we typically destroy all information related to you and our use of your personal information if you have failed to visit the Website and transact with company in a 1 year period.</p>
<ol start="4">
<li><strong>Your Rights</strong></li>
</ol>
<p>If you wish to Opt-Out from any of the aforementioned uses of Personal Information, except in the case of Legal Proceedings, please contact us at support@partnersedge.com. Your subsequent disclosure of Personal Information nullifies any prior Opt-Out request. Company does not discriminate against those who opt-out. However, opting out may prevent us from conveniently and efficiently providing further products, services and information to you.</p>
<ol start="5">
<li><strong>Canadian Residents</strong></li>
</ol>
<p>This section applies to Canada resident only.</p>
<p>Your personal information may be transferred outside of Canada. Company and its service providers may store personal information on servers located in other jurisdictions, including the United States. Please note that privacy laws in such jurisdictions differ from Canadian privacy laws (e.g., PIPEDA) and that in some jurisdictions your personal information may be accessed by law enforcement authorities or the courts in such jurisdictions. You may obtain information and address questions about the&nbsp;<em>Privacy Policy</em>&nbsp;and practices relating to handling of your personal information outside of Canada by contacting our Privacy Officer identified below in Section 9.</p>
<p>If you wish to access your Personal Information, or request that your Personal Information be corrected or removed from our database, you may contact our Privacy Officer as outlined below. Company, within a commercially reasonable time, will provide access to this information, correct any factual inaccuracies identified, and remove information as requested. We may be unable to remove information to the extent that it is permitted or required to be retained by applicable law or document retention and data backup policies, or if removal is not practicable due to technological reasons. Removal of your personal information may prevent us from providing further services and information to you.</p>
<p>Company may require you to provide sufficient information to prove your identity prior to Company providing an account of the existence, use, and disclosure of your personal information. The information provided shall only be used for this purpose.</p>
<ol start="6">
<li><strong>California Residents</strong></li>
</ol>
<p>This section applies to California residents only.</p>
<p>Pursuant to Section 1798.83 of the California Civil Code, residents of California have the right to request from a business, with whom the California resident has an established business relationship, certain information with respect to the types of personal information the business shares with third parties for direct marketing purposes by such third party and the identities of the third parties with whom the business has shared such information during the immediately preceding calendar year. To request such information from Company, please contact us by email at&nbsp;support@partnersedge.com, subject line “Shine the Light”, call toll free&nbsp;1-888-233-2357&nbsp;or write to us at the address listed in Section 8 below.</p>
<p>Pursuant to 1798.100 et seq. of the California Civil Code, residents of California may request that a business that collects a California resident’s personal information disclose certain categories and specific pieces of personal information collected, as permitted under California Consumer Privacy Act. The resident may also request that the business delete personal information collected about the consumer or request the Company not sell the information. To make a request pursuant to the foregoing, you can contact us by email at&nbsp;<a href="mailto:support@partnersedge.com">support@partnersedge.com</a>, subject line “CCPA”, call toll free&nbsp;1-888-233-2357&nbsp;or write to us at the address listed in Section 8 below.</p>
<p>If you are a California resident and do not want us to sell your Personal Information, do not share it with us, or, if you have, click the following DO NOT SELL MY PERSONAL INFORMATION, or click the same link which is found on the homepage. Further, if you wish to Opt-Out from any of Company’s uses of your Personal Information as set forth herein, except in the case of Legal Proceedings, please contact <a href="mailto:support@partnersedge.com">support@partnersedge.com</a>.</p>
<p>In you exercise any of the foregoing rights, Company may require you to provide sufficient information to prove your identity and residence prior to Company taking action. The information provided shall only be used for this purpose.</p>
<ol start="7">
<li><strong>Children</strong></li>
</ol>
<p>The Website is not intended or designed to be used by anyone under the age of 13. It is not meant to be attractive to anyone under the age of 13, or to have any value or use by anyone under the age of 13. Company does not collect Personal Information from any person it knows to be under the age of 13. If you are under 13, DO NOT TRANSACT WITH US THROUGH THIS WEBSITE OR OTHERWISE, AND DO NOT SEND ANY PERSONAL INFORMATION. IF YOU ARE BETWEEN THE AGES OF 13 AND 17, DO NOT USE THIS WEBSITE UNLESS YOU ARE SUPERVISED BY A PARENT/GUARDIAN OR HAVE RECEIVED PERMISSION FROM YOUR PARENT/GUARDIAN.</p>
<ol start="8">
<li><strong>Contact Info</strong></li>
</ol>
<p>If you have any questions about this Privacy Policy, this Website or its offerings, or if you have questions or concerns about the collection, use, disclosure, amendment or deletion of your Personal Information, you may contact us online at&nbsp;<a href="mailto:support@partnersedge.com">support@partnersedge.com</a>, subject line “Privacy Policy” or at the following address:</p>
<p>Partners Edge Network</p>
<p>Attention: Partners Edge</p>
<p>825 US HWY 1 #320</p>
<p>Jupiter, FL 33477</p>
<p>&nbsp;</p>
<p><strong>Cookies</strong></p>
<p>This Website uses Cookies to personalize your user experience, for our marketing measures, and for analytics purposes. A more complete disclosure of our use and placement of Cookies is found in our Privacy Policy and Terms and Conditions. Understand and consent (i) to our setting and using of all Cookies, (ii) to our subsequent processing of the data collected from the use of the Cookies, which then may be combined with other data collected from your through your use of Website, and (iii) that you have read, understand, and agree to be bound by the Website Privacy Policy and Terms and Conditions. If you desire your own Cookie preferences, you may modify or limit our use of Cookies in Cookie Settings. If you do not agree to be bound by the Terms and Conditions, close the website now.</p>
<p>Cookies make the use of our Website easier by, among other things, saving your preferences. We may also use cookies to deliver content tailored to your interests. Our cookies may enable us to relate your use of the Website to Personal Information that you previously provided.</p>
<p>The information that we collect with cookies allows us to statistically analyze usage of the Services, and to improve and customize our content and other offerings. However, we only disclose information collected with cookies to third parties on an aggregated basis without the use of any information that personally identifies you.</p>
<p>The specific types of first party and third party cookies placed by our Services and the purposes they perform are described in the table below:</p>
<table>
<thead>
<tr>
<td>
<p><strong>Types of cookies</strong></p>
</td>
<td>
<p><strong>How to refuse</strong></p>
</td>
</tr>
</thead>
<tbody>
<tr>
<td>
<p>Strictly Necessary Cookies<br> These are cookies that are required for the operation of our Services. They include, for example, cookies that enable you to log into secure areas of our websites.</p>
</td>
<td>
<p>These cookies are strictly necessary to deliver the Site. They can be deleted or blocked using your browser settings.</p>
</td>
</tr>
<tr>
<td>
<p>Performance and Functionality Cookies<br> These are used to recognize you when you return to our Services. This enables us to personalize our content for you and remember your preferences (for example, your choice of language or region), but are non-essential to the performance of our Services.</p>
</td>
<td>
<p>These cookies can be deleted or blocked using your browser settings.</p>
</td>
</tr>
<tr>
<td>
<p>Analytical or Customization Cookies<br> These cookies collect information about how users access and move through our Services. We use this information in either aggregate form to help us to improve the way our Services work, or to personalize our Services to your interests.</p>
</td>
<td>
<p>These cookies can be deleted or blocked using your browser settings (see How to Control Cookies, below).<br> Alternatively, please follow the links below to review the third party’s privacy policy or to opt-out:<br> Google Universal Analytics&nbsp;<a href="https://tools.google.com/dlpage/gaoptout">https://tools.google.com/dlpage/gaoptout</a></p>
</td>
</tr>
<tr>
<td>
<p>Marketing and Targeting Cookies<br> These cookies are use for online behavioral advertising information and to control advertisements and marketing you receive on the website. These Cookies typically collect information about your browsing habits. The purpose is to provide you with targeted advertisements that may be of interest to you. Additionally, these Cookies allow us to analyze your website browsing behavior to further customize our product marketing approach.</p>
</td>
<td>
<p>These cookies can be deleted or blocked using your browser settings. For more information regarding opting out of targeted advertising, please visit&nbsp;<a href="http://www.aboutads.info/choices/">http://www.aboutads.info/choices/</a>&nbsp;or&nbsp;<a href="http://www.youronlinechoices.com/">http://www.youronlinechoices.com</a>.</p>
</td>
</tr>
<tr>
<td>
<p>How to Control Cookies</p>
</td>
<td>
<p>You have the right to decide whether to accept or reject cookies. You can exercise your cookie preferences specific to our websites by clicking here. Your cookie preferences will be limited to first and third party cookies on this website only, and must be set for each device used and each website you access.</p>
<p>You can exercise your preferences with some third-party cookies by clicking on the appropriate opt-out links provided in the cookie table above, or by visiting third-party websites. Company does not control any third-party opt-out links or websites and is not responsible for any choices you make using these mechanisms.</p>
<p>You can also set or amend your web browser controls to accept or refuse cookies. If you choose to reject cookies, you may still use our website though your access to certain portions of it and to some functionality may be limited. Web browser controls vary, so you should visit your browser's help menu for more information.</p>
<p>Also, for further information on cookies, including how to see what cookies have been set on your device and how to manage and delete them, visit&nbsp;<a href="http://www.allaboutcookies.org/">www.allaboutcookies.org</a>.</p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p><strong>CCPA</strong></p>
<p>This section applies to California residents only.</p>
<p>Pursuant to Section 1798.83 of the California Civil Code, https://oag.ca.gov/privacy/ccpa, residents of California have the right to request from a business, with whom the California resident has an established business relationship, certain information with respect to the types of personal information the business shares with third parties for direct marketing purposes by such third party and the identities of the third parties with whom the business has shared such information during the immediately preceding calendar year. To request such information from Company, please contact us by email at&nbsp;support@partnersedge.com subject line “CCPA”, or write to us at 192 NW Central Park Plaza, St. Lucie West, FL 34986.</p>
<p>Pursuant to 1798.100 et seq. of the California Civil Code, residents of California may request that a business that collects a California resident’s personal information disclose certain categories and specific pieces of personal information collected, as permitted under California Consumer Privacy Act. The resident may also request that the business delete personal information collected about the consumer or request the Company not sell the information. To make a request pursuant to the foregoing, you can contact us by email at&nbsp;support@partnersedge.com, subject line “CCPA”, call toll free&nbsp;1-888-233-2357&nbsp;or write to us at the address listed in Section 8 below.</p>
<p>If you are a California resident and do not want us to sell your Personal Information, do not share it with us, or, if you have, click the following DO NOT SELL MY PERSONAL INFORMATION, or click the same link which is found on the homepage. Further, if you wish to Opt-Out from any of Company’s uses of your Personal Information as set forth herein, except in the case of Legal Proceedings, please contact support@partnersedge.com.</p>
<p>In you exercise any of the foregoing rights, Company may require you to provide sufficient information to prove your identity and residence prior to Company taking action. The information provided shall only be used for this purpose.</p>
<p>&nbsp;</p>
<p>Arbitration</p>
<p>If you have any dispute concerning any aspect of these Terms of Website Use, the Website, or any of our services, you agree to submit your dispute for resolution by arbitration before the American Arbitration Association ("AAA") in the county where you live by filing a Demand for Arbitration. The arbitrator will have exclusive authority to resolve any dispute including any claim that all or any part of these Terms of Website Use are unenforceable.</p>
<p>&nbsp;</p>
<p>Opt-Out of Arbitration/Class Action Waiver. The Terms &amp; Conditions do not constitute a waiver of any of your rights and remedies to pursue a claim individually and not as a class action in binding arbitration as provided above.&nbsp; This provision preventing you from bringing, joining or participating in class action lawsuits is an independent agreement.&nbsp; You may opt-out of these Dispute Resolution Provisions by providing written notice of your decision within thirty (30) days of the date that you first register on the cascadecoverage.com Website.</p>
<p>&nbsp;</p>
<p>YOU ACKNOWLEDGE AND AGREE THAT, VIA YOUR ACCEPTANCE OF THESE DISPUTE RESOLUTION PROVISIONS, YOU WAIVE ANY RIGHT TO A JURY TRIAL, AS WELL AS YOUR RIGHT TO BRING, JOIN OR PARTICIPATE AS A PLAINTIFF OR A CLASS MEMBER IN A CLASS ACTION SUIT OR MULTI-PARTY ARBITRATION BROUGHT AGAINST US, ANY PERSON RELATED TO US OR A SERVICE PROVIDER USED BY US TO PROVIDE THE SERVICE.</p>
<p>&nbsp;</p>
</div>


    
</div>
                    </div>
             
       </div> 

</html>

