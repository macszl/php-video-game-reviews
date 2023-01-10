<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
    <title>VG Reviews Admin page</title>
    <link
      rel="stylesheet"
      href="../css/style.css"
    />
  </head>

  <body>
    <div class="filling-body">
      <?php
      session_start();
      require '../../vendor/autoload.php';

      $loader = new Twig\Loader\FilesystemLoader('../templates');
      $twig = new Twig\Environment($loader, [
        'cache' => '../../dist',
      ]);

      include '../templates/navbar.php';
      ?>

      Terms and conditions of use
        By accessing and using vgreviews.com and any other site, application, API or embedded content owned or operated by VGReviews team (the “Service”), you accept and agree to be bound by the following terms and conditions (“Terms”):

        Use: You may only use the Service in accordance with these Terms. All rights not expressly granted to you in these Terms are reserved by us.
        Responsibility: You will be responsible for all activity that occurs as a result of your use of the Service. We disclaim any and all liability (including for negligence) for the content, opinions, statements or other information posted to, or use of, the Service by its users.
        Provision of information: In order to use the services provided on the Service, you must be at least 12 years of age. When you register to use the Service, you agree to provide true, accurate, current and complete information about yourself as prompted.
        Community policy: You must be courteous and respectful of others’ opinions, and you must not post unwelcome, aggressive, suggestive or otherwise inappropriate remarks directed at another member of the Service.
        Conduct: You must not use the Service to promote, engage in or incite hate, violence, discrimination or intolerance, including based on race, age, gender, gender identity, ethnicity, religion, disability, sexual orientation or other protected attribute. We reserve the right to remove content that has the potential to harm communities we consider worthy of protection. We reserve the right to consider off-platform behavior as part of our moderating process. You must not use the Service (or encourage others to use the Service) to create multiple accounts, deceive or mislead other users, disrupt discussions, circumvent account blocks, game the Service’s mechanics, alter consensus, participate in orchestrated attacks against films or filmmakers, post spam or otherwise violate our community policy. You must not follow an excessively high number of accounts (or like an excessive number of reviews or lists) in order to generate reciprocal follows or likes and thereby manipulate your account’s popularity.
        No malicious use: You agree to access the Service through the interface we provide. You must not use the Service for any malicious means, or abuse, harass, threaten, intimidate or impersonate any other user of the Service or any Letterboxd employee. You must not request or attempt to solicit personal or identifying information from another member of the Service. You must not mislead the Service’s support or moderation representatives, such as by making false or malicious reports about other members or their content, or by sending (or encouraging others to send) multiple reports regarding the same content or issue. Such behaviors may result in action being taken on your account.
        No illegal use: You must not use the Service for any unlawful purpose, or post any information that is in breach of any confidentiality obligation, copyright, trade mark or other intellectual property or proprietary rights of any person.
        Removal of content: We reserve the right to remove any content posted to the Service that we consider (in our absolute discretion) to be offensive, objectionable, unlawful, explicit, graphic or otherwise in breach of these Terms, including content that expressly (or implicitly, through coded language, symbol, keywords or tags) praises, supports, promotes or represents white-nationalist or neighboring ideologies. We reserve the right to remove any content posted to the Service that disseminates misinformation and its related manipulations, including viral sloganeering.

      
    </div>
    <?php include '../components/footer.php'; ?>
  </body>
</html>
