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




                       <p style="font-style: 14px">"<div class="container">
<div class="container">	
 <p><strong>WEBSITE USE TERMS AND CONDITIONS</strong></p>
<p><a href="https://www.cascadecoverage.com/privacy">Click here to view the Privacy Policy</a></p>
<p>Welcome to cascadecoverage.com (“Website”). This Website is offered, controlled and operated by Partners Edge Network LLC (“Company”). This Website contains the Website Use Terms and Conditions (“Terms and Conditions”) pursuant to which Company allows you to use Website. Company only allows you to use this Website pursuant to your express consent to the Agreement which includes these Terms and Conditions, the Company’s&nbsp;<a href="https://www.cascadecoverage.com/privacy"><em>Privacy Policy</em></a>&nbsp;which is expressly incorporate by reference as if fully set forth herein, and any other disclaimers, and other supplemental terms and conditions or documents that may be published from time to time on the Website (collectively, the “Agreement”).</p>
<p>The Website and any services of Company related thereto offered by Company are available only to individuals who are at least eighteen (18) years of age and who can enter into legally binding contracts under Utah state law, which governs this Agreement and your transactions with company through Website. The Company reserves the right, in its sole discretion, to limit access to Website at any time and for any reasons whatsoever or for no reason.</p>
<p><strong>IT IS YOUR EXCLUSIVE OBLIGATION TO REVIEW EVERY ASPECT OF THE AGREEMENT CAREFULLY AND TO UNDERSTAND IT. IF YOU DO NOT AGREE TO BE BOUND BY THE AGREEMENT, COMPANY DOES NOT AUTHORIZE YOU TO ACCESS OR USE THE WEBSITE IN ANY WAY. YOUR USE AND/OR ACCESS TO THE PAGES INCLUDED IN THE WEBSITE BEYOND THE WELCOME PAGE ARE YOU EXPRESS REPRESENTATION THAT YOU ARE AT LEAST EIGHTEEN (18) YEARS OF AGE, AND THAT YOU HAVE READ, UNDERSTAND AND EXPRESSLY CONSENT TO BE BOUND BY THIS AGREEMENT.</strong></p>
<p>Company reserves the right to modify these Terms and Conditions from time to time without prior notice to you. You can know if these Terms and Conditions and the other components of the Agreement have been changed by referring to the date at the top of each posted document. It is your exclusive obligation to review these Terms and Conditions carefully.&nbsp;<strong>If you do not agree to be bound by all provisions, do not use this Website.</strong></p>
<ol>
<li>License and Use</li>
</ol>
<p>Grant. You are granted the limited, non-exclusive, license to access this Website via the Internet, to view the content and material on this Website, and to use the Website for its intended purpose and consistently with these Terms and Conditions. Website Use. This Website is being made available solely for your personal use only. You may NOT use this Website, or its contents: (a) for any purpose inconsistent with the letter or spirit of the License; (b) for any unlawful purpose; (c) to solicit others to perform or participate in any unlawful acts; (d) to violate any international, federal, provincial or state regulations, rules, laws, or local ordinances; (e) to infringe upon or violate our intellectual property rights or the intellectual property rights of others; (f) to harass, abuse, insult, harm, defame, slander, disparage, intimidate, or discriminate based on gender, sexual orientation, religion, ethnicity, race, age, national origin, disability, or gender; (g) to submit false, inaccurate, or otherwise misleading information; (h) to upload or transmit viruses or any other type of malicious code that will or may be used in any way that will affect the functionality or operation of this Website or of any related Website, other Websites, or the Internet; (i) to collect or track the personal identification information of others; (j) to spam, phish, pharm, pretext, spider, crawl, or scrape; (k) for any obscene or immoral purpose; (l) to invite, induce or otherwise cause Company or any of its marketing affiliates to contact you for purposes of establishing facts to support a cause of action or claim arising out of the communication, or (m) to interfere with or circumvent the security features of this Website or any related Website, other Websites, or the Internet. You shall NOT copy or reverse engineer any aspect of this Website. You shall NOT modify, adapt, translate or convert into another form any portion of this Website. You shall NOT copy, reproduce or download any of the content, including source code, of this Website by any means or in any form. You shall NOT display, perform, transmit or publish any of the content of this Website by any means or in any form, other than as permitted in this Agreement. You may NOT access this Website from any jurisdiction where doing so would be illegal. You agree to use this Website only for its intended purpose and in a manner that is authorized. Without intending any limitation of the above prohibitions, you agree to comply with all laws pertaining to privacy, data collection and protection, intellectual property, contract and other applicable laws, including but not limited to those laws in the jurisdiction in which you. If you know of, or suspect, copyright or trademark infringement or other unauthorized or improper use of the contents of this Website by others, including but not limited to uses for commercial purposes, please notify Company.</p>
<ol start="2">
<li>Intellectual Property</li>
</ol>
<p>All of the content and material used in constructing the Website and that you see and hear on this Website is subject to United States and international copyright, trade dress, trademark and/or other intellectual property laws with all rights thereto held by Company. Use of any content or material on this Website without prior written authorization by Company is strictly prohibited and may subject you to liability. For purposes of this Agreement, “content and material” is defined as any information, communications, software, published works, photos, video, graphics, music, sounds, or other material that can be viewed or heard by users on our Website and is owned by Company. You are granted the limited permission to use this Website only as stated in these Terms and in the License provisions of this Agreement. Digital Millennium Copyright Act. Company has not taken and will not take content from you or any third party unless it has been assigned to Company and Company has appropriate legal permission. However, if you are a copyright holder and have a good faith belief that any content or materials posted on this Website infringes your copyright, please send to us your notification of claimed infringement requesting the material to be removed or blocked. Your notice must contain the following: (a) Reasonably sufficient details about the nature of the copyrighted work in question, or, in the case of multiple alleged infringements, a representative list of such works, including title(s), author(s), any U.S. Copyright Registration number(s), URL(s) etc.; (b) Reasonably sufficient details to enable us to identify and locate the material that is allegedly infringing the copyright holder’s work(s) (for example, file name or URL of the page(s) that contain(s) the material); (c) Your contact information so that we can make contact with you (including for example, your address, telephone number, and email address); (d) A statement that you have a good faith belief that the use of the material identified above in “b” is not authorized by the copyright owner, its agent, or the law; (e) A statement, under penalty of perjury, that the information in the notification is accurate and that you are authorized to act on behalf of the copyright owner; and (f) Your signature. Prior to sending us notice, you may wish to consult a lawyer to determine your rights and legal obligations under applicable laws. Nothing here or anywhere on this Website is intended as a substitute for qualified legal advice. You also acknowledge and agree that upon receipt of a notice of a claim of copyright infringement, we may temporarily or permanently remove the identified materials from the Website without liability to you or any other party.</p>
<ol start="3">
<li>TCPA and Email Opt-In</li>
</ol>
<p>Company strictly complies with the Telephone Consumer Protection Act, the CAN-SPAM Act, and all other laws and regulations regarding telephonic and electronic communication.</p>
<p>In filling in the Website form, and in submitting it to Company by clicking the “View Plans” button on the Website, you willingly and intentionally provide your signature giving express consent to receive marketing communications via automated telephone dialing systems, artificial or pre-recorded voices, emails, live phone calls, pre-recorded calls, postal mail, text messages via SMS or MMS and other forms of communication regarding offers of Life Insurance, Final Expense, Burial Insurance, and other senior home, health and assistance products from any of the Marketing Partners listed below, to the number(s) and/or email you provide, including a mobile phone, even if you are on a state or federal Do Not Call and/or Do Not Email registry. The list of Marketing Partners is subject to change. You also understand that your wireless carrier may impose charges for calls or texts. Further, you understand that your consent to receive communications is not a condition of purchase and you may revoke your consent at any time. To receive quotes without providing consent, please call at 1-561-691-1552.</p>
<p>Marketing Partners are listed below in Section 17.</p>
<p>You agree to only provide your own truthful and accurate personal and contact information, or truthful and accurate personal and contact information for others from whom you have express authorization for the express purposes of providing it to Company.</p>
<ol start="4">
<li>Privacy Policy</li>
</ol>
<p>Any personally identifiable information you provide when using the Website will be collected and used by Company in accordance with its&nbsp;<a href="https://www.cascadecoverage.com/privacy"><em>Privacy Policy</em></a>&nbsp;which is incorporated into this Agreement as if fully set forth herein. Confidentiality and the use and treatment of Confidential Information is also covered by the&nbsp;<a href="https://www.cascadecoverage.com/privacy"><em>Privacy Policy</em></a>.</p>
<ol start="5">
<li>Disclaimer and Claim Limitation Period</li>
</ol>
<p>You acknowledge that the Website may be provided over the Internet and therefore the availability of the Website may be affected by factors outside of Company's reasonable control. Company has no responsibility whatsoever for unavailability of the Website, or any difficulty or inability to download or access the Website or for any other failure which may result in the Website being unavailable.</p>
<p>Disclaimer. ALTHOUGH COMPANY TAKES REASONABLE EFFORTS TO VERIFY THE CONTENT OF THE WEBSITE, COMPANY DOES NOT REPRESENT OR GUARANTEE THAT THE CONTENT IS ACCURATE, COMPLETE, USEFUL, TIMELY OR RELIABLE, OR THAT THIS WEBSITE WILL OPERATE WITHOUT ERROR OR DISRUPTION. THIS WEBSITE COULD INCLUDE TECHNICAL OR OTHER MISTAKES, INACCURACIES OR TYPOGRAPHICAL ERRORS. COMPANY MAY MAKE CHANGES TO THE CONTENT OF THIS WEBSITE AT ANY TIME WITHOUT NOTICE. THE CONTENT OF THIS WEBSITE MAY BE OUT OF DATE, AND WE MAKE NO COMMITMENT TO UPDATE SUCH CONTENT.</p>
<p>YOU EXPRESSLY UNDERSTAND AND AGREE THAT: (A) YOUR USE OF THIS WEBSITE IS AT YOUR SOLE RISK, AND THE WEBSITE IS PROVIDED ON AN “AS IS” AND “AS AVAILABLE” BASIS ONLY, AND COMPANY EXPRESSLY DISCLAIMS ALL WARRANTIES OF ANY KIND, WHETHER EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, WARRANTIES AS TO SERVICES PROVIDED ON THIS WEBSITE, IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, AND NON-INFRINGEMENT; (B) WITHOUT LIMITING THE FOREGOING, COMPANY MAKES NO WARRANTY THAT (i) THE WEBSITE WILL MEET YOUR REQUIREMENTS, (ii) THE WEBSITE WILL BE UNINTERRUPTED, TIMELY, SECURE, ERROR-FREE, OR VIRUS OR MALWARE FREE, (iii) THE RESULTS THAT MAY BE OBTAINED FROM THE USE OF THE WEBSITE WILL BE EFFECTIVE, ACCURATE OR RELIABLE, (iv) THE QUALITY OF ANY CONTENT OR OFFERINGS USED, OBTAINED, PURCHASED AND/OR LICENSED FROM THE WEBSITE OR COMPANY WILL MEET YOUR EXPECTATIONS OR BE FREE FROM MISTAKES, ERRORS OR DEFECTS, OR (v) ANY ERRORS IN THE WEBSITE WILL BE CORRECTED; AND (C) ANYTHING DOWNLOADED OR OTHERWISE OBTAINED FROM THIS SITE IS ACCESSED AT YOUR OWN RISK, AND YOU WILL BE SOLELY RESPONSIBLE FOR ANY DAMAGE TO YOUR COMPUTER SYSTEM OR MOBILE DEVICE THAT RESULTS FROM THE USE OF ANY SUCH MATERIAL.</p>
<p>WE ARE NOT RESPONSIBLE FOR YOUR DEALINGS WITH ANY THIRD PARTY RELATED TO OR ARISING FROM YOUR USE OF THIS WEBSITE. YOU AGREE TO RESOLVE ANY DISPUTES WITH THIRD PARTIES DIRECTLY WITH SUCH PARTIES, AND YOU AGREE NOT TO INVOLVE COMPANY IN ANY DISPUTE WITH THIRD PARTIES. YOU RELEASE COMPANY FROM ALL CLAIMS, DEMANDS AND DAMAGES RELATED TO DISPUTES BETWEEN YOU AND THIRD PARTIES.</p>
<p>COMPANY MAKE NO PROMISES AND DISCLAIM ALL LIABILITY FOR USE OF THIS WEBSITE OUTSIDE THE UNITED STATES.</p>
<p>Claim Limitation Period. You acknowledge and agree that you may not bring any legal action, regardless of form, arising out of this Agreement or relating to the Website, more than one year after you have knowledge, or reason to know, of the occurrence which gives rise to the cause of such action, regardless of whether you have yet suffered any injury therefrom.</p>
<ol start="6">
<li>Limitation of Liability</li>
</ol>
<p>IF YOU ARE DISSATISFIED WITH THIS WEBSITE, INCLUDING ANY FUNCTIONALITY OR CONTENT HEREON, OR THESE TERMS, YOUR SOLE REMEDY AND EXPRESS OBLIGATION IS TO STOP USING THE WEBSITE. IN THE EVENT YOU FAIL TO STOP USING THE WEBSITE AND CLAIM SOME INJURY AS THE RESULT, YOU AGREE TO INDEMNIFY AND HOLD COMPANY HARMLESS FROM ANY AND ALL LOSSES OR DAMAGE, INCLUDING ATTORNEY’S FEES INCURRED BY COMPANY IN DEFENSE OF ANY ACTION INITIATED BY YOU OR A THIRD PARTY.</p>
<ol start="7">
<li>Third Party Service Interoperability</li>
</ol>
<p>The Website and related services provided by Company may contain features designed to interoperate with third party services and/or applications. To use such features, you may be required to obtain access to such services and/or applications from third party providers, and may be required to grant Company access to such third party provider account(s). If such third party provider ceases to make service or application available for interoperation with the corresponding features provide by Company on reasonable terms, Company may cease providing those features without entitling you to any refund, credit, or other compensation.</p>
<ol start="8">
<li>ADA Policy</li>
</ol>
<p>Company’s goal is to permit customers and potential customers to successfully gather information and conduct business through the Website, including individuals with visual impairments that use screen readers to view the Website. Company has taken steps and is devoting resources to promote Website accessibility.</p>
<p>If you have difficulty accessing features or functions on this website, email us at&nbsp;<a href="mailto:Info@cascadecoverage.com">Info@cascadecoverage.com</a>&nbsp;and/or call our customer service line at 1-561-691-1552 and we will work with you to provide the information you seek.</p>
<ol start="9">
<li>Submissions</li>
</ol>
<p>Submissions and Assignment of Rights. Company appreciates hearing your comments, suggestions and testimonials regarding this Website. However, nothing in this Agreement should be construed to require from you any comments, suggestions, testimonials or materials of any kind (collectively “Submissions”) and Company does not give any consideration of any kind in exchange for any Submissions. Any of your Submissions, whether provided electronically via this Website or otherwise, shall be and remain the exclusive property of Company. This includes any of your ideas or inventions contained in your Submissions. Your Submissions shall constitute a voluntary and irrevocable assignment to Company of all worldwide intellectual property rights in your Submissions, entitling Company to use, make, have made, offer to sell, sell, copy, reproduce, display, translate, summarize, modify, edit, publish, adapt, incorporate into other works and/or distribute them for any purpose, commercial or otherwise, without restriction and without compensation to you. Accordingly, your Submissions may be treated as non-confidential and non-proprietary (subject to Company’s Privacy Policy). Please do NOT submit information you do not wish to assign to Company or you do wish to retain as confidential or proprietary (for example patentable ideas, new content suggestions or business proposals).</p>
<p>Representations and Warranties. You represent and warrant that the content in any of your Submissions is your own original content and that no other person has any rights thereto. You represent and warrant that your Submissions do not and will not violate any right(s) of any third-party, including copyright, trademark, privacy, or other personal or proprietary right. You further agree that your Submissions will not contain libelous or otherwise unlawful, abusive or obscene material, or contain any computer virus or other malware that could in any way affect the operation of this Website or any related website. You may not use false personal identification information, pretend to be someone other than yourself, or otherwise mislead us or third-parties as to the origin of your Submissions. You are solely responsible for the Submissions you make and their complete accuracy.</p>
<p>Communications Decency Act. Regarding Submission, Company invokes Section 230 of the Communications Decency Act (47 U.S.C. § 230) (hereinafter “CDA”). Company advises users of its Website that parental control protections (such as computer hardware, software, or filtering services) are commercially available that may assist the customer in limiting access to material that is harmful to minors. Pursuant to the CDA, Company takes no responsibility and assume no liability for any Submissions you make to us. Company may, but has no obligation to, monitor, edit or remove content that Company determines in its sole discretion to be unlawful, offensive, threatening, libelous, defamatory, pornographic, obscene or otherwise objectionable or in violation of any third-party’s intellectual property rights or this Agreement.</p>
<ol start="10">
<li>Termination</li>
</ol>
<p>Disputes. A “Dispute” shall be defined as any controversy, claim, dispute or difference between you and Company arising out of or relating to this Agreement, this Website, any promotion, advertisement, statement and/or representation related to the Company and/or the Materials, and/or any other action taken by you or Company that relates in any way to, or arises from, your transaction of business, communication, and/or interaction with Company through Website. It is intended to be construed as broadly as possible.</p>
<ol start="11">
<li>Dispute Resolution Policy</li>
</ol>
<p>Choice of Law and Jurisdiction. All Disputes will be governed by the laws of the state of Utah, United States of America, without regard to any conflict of law principles. You agree that your access to and use of Website in any way shall be treated the same as if you were to physically visit Company’s location in Utah, and therefore, you expressly consent that the state and federal courts in Utah may exercise personal jurisdiction over you related to any Dispute.</p>
<p>Mediation. Prior to pursuing any claim as set forth in Section 11 herein, you agree to mediate any Dispute with Company. Mediation shall be conducted in good faith in Utah, and will be conducted by a non-biased, independent mediator. All parties to the mediation agree to equally split the mediator fees and associated costs. Failure to timely pay such fees or costs shall be deemed a material breach hereof and shall warrant the immediate entry of requested relief against the breaching party (i.e., default judgment, dismissal with prejudice, etc.).</p>
<p>Arbitration. IF MEDIATION IS UNSUCCESSFUL, ANY DISPUTE SHALL BE RESOLVED SOLELY AND EXCLUSIVELY BY BINDING ARBITRATION TO BE HELD IN OR NEAR SALT LAKE COUNTY, STATE OF UTAH BY A SINGLE DISINTERESTED ARBITRATOR AND PURSUANT TO UTAH LAW. YOU EXPRESSLY ACKNOWLEDGE THAT ARBITRATION DOES NOT PERMIT JUDICIAL OR CLASS ACTION PROCEEDINGS, AND YOU EXPRESSLY WAIVE YOUR RIGHT TO PARTICIPATE IN A JUDICIAL OR CLASS ACTION PROCEEDING, EITHER AS A REPRESENTATIVE, PARTICIPANT OR MEMBER AND YOU EXPRESSLY AGREE TO PROCEED IN A NON-CLASS ARBITRATION.</p>
<p>Except as may be required to enforce an arbitration decision, you and the Company expressly waive the right to file any legal action in any other state or federal court or before any other tribunal, and the right to a trial by jury.</p>
<p>Attorney’s Fees. In any event any action is brought by either party arising out of or relating to this Agreement, whether sounding in contract, tort or otherwise, the parties shall be responsible for payment of their own attorney’s fees and costs.</p>
<ol start="12">
<li>Notice</li>
</ol>
<p>Any notice hereunder shall be in writing and shall be deemed to have been duly given: (i) five (5) business days after the date of mailing if sent by registered or certified U.S. mail; (ii) when delivered if delivered personally or sent by express courier service; (iii) when transmitted if sent by a confirmed facsimile; or (iv) when transmitted via e-mail, provided that the receiving party acknowledges receipt by return email or that sender receives an automated confirmation of receipt.</p>
<ol start="13">
<li>Force Majeure</li>
</ol>
<p>Company will not be in default or otherwise liable for any delay in or failure of its performance under these Terms and Conditions if such delay or failure arises by any reason beyond its reasonable control, including any act of God, criminal acts of third parties, or any acts of the common enemy, the elements, earthquakes, floods, fires, epidemics, riots, failures or delays in transportation or communications, disruptions of service providers and technology, or any act or failure to act by you. The parties will promptly inform and consult with each other as to any of the above causes that, in their judgment, may or could be the cause of a substantial delay in the performance of their respective obligations hereunder. Company is not liable for excusable delay.</p>
<ol start="14">
<li>Assignment</li>
</ol>
<p>Company may assign or transfer the Website and/or its rights, obligations and benefits under these Terms and Conditions, in whole or in part, for any reason, at any time without notice to you.</p>
<ol start="15">
<li>International Use</li>
</ol>
<p>Although this Website may be accessible worldwide, we make no representation that this Website is appropriate or available for use in locations outside the United States. Furthermore, the website promotes products only available to residents of the United States. Those who choose to access this Website from outside the United States do so on their own initiative and at their own risk. If you choose to access this Website, you are responsible for compliance with local laws in your jurisdiction, including but not limited to protection of personal identification information and the taxation of products purchased over the Internet. Company reserves the right to refuse or rescind the licenses from locations outside the United States.</p>
<ol start="16">
<li>Company Contact</li>
</ol>
<p>Auto Insurance Companion</p>
<p>825 US Hwy 1 #320, Jupiter, FL 33477</p>
<p>1-561-691-1552</p>
<p><a href="mailto:Info@cascadecoverage.com">Info@cascadecoverage.com</a></p>
<p>&nbsp;</p> </div>
<p>&nbsp;</p>
</div>
                    </div>
             
       </div> 

</html>

