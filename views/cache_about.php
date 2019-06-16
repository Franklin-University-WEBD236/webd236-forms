<!DOCTYPE html>
<html>
  <head>
    <title><?php echo(htmlentities($title)); ?></title>
    <link rel="shortcut icon" href="https://cdn.glitch.com/7635e9c3-2015-4ec8-967a-16ca37cc9e55%2Ffavicon.ico" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/static/style.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <script src="/static/custom.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
      <a class="navbar-brand" href="/">
        <img src="https://cdn.glitch.com/5b0f8a54-892a-4d86-9d84-94836d1a3a6c%2Fblog.svg?v=1560192184638" width="30" height="30" class="d-inline-block align-top" alt=""> PHP Forms Examples</a>
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/sweet">My sweet form</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://glitch.com/edit/#!/remix/<?php echo(htmlentities(getenv('PROJECT_DOMAIN'))); ?>">Remix</a>
        </li>
      </ul>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="display-4"><?php echo(htmlentities($title)); ?></h1>
          <p class="lead">PHP Forms Examples. This demonstrates basic and complex forms and their processing through a script.</p>
          <p><em>Author: <a href="https://www.franklin.edu/about-us/faculty-staff/faculty-profiles/whittakt">Todd Whittaker</a></em></p>
          <hr>
        </div>
      </div>
      
<?php  if (isset($errors)): ?>
<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-danger">
      Please fix the following errors:
      <ul class="mb-0">
<?php  foreach ($errors as $error): ?>
        <li><?php echo(htmlentities($error)); ?></li>
<?php  endforeach; ?>
      </ul>
    </div>
  </div>
</div>
<?php  endif;?>
  

      

<div class="row">
  <div class="col-lg-12">
<h1><?php echo(htmlentities($title)); ?></h1>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam hendrerit quam at purus dignissim, vel placerat est efficitur. In nec nisl placerat, pellentesque felis tempus, sollicitudin urna. Duis eu augue vitae massa scelerisque blandit. Aliquam vel nunc ac dui finibus venenatis at facilisis ante. Vestibulum iaculis nunc nunc, a placerat mi tincidunt ut. Sed euismod nisi eget justo tristique ultrices. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut vestibulum efficitur ante, vel dignissim sem. Integer congue ac nunc sit amet tempor. Aliquam sollicitudin metus metus, nec lacinia metus lobortis ut. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec at nulla tellus. Ut ac tellus arcu. Pellentesque pretium lorem nec mollis pretium. Morbi turpis mi, mattis id dapibus eu, blandit quis libero.</p>

<p>Cras elementum, nulla non congue pulvinar, orci lorem efficitur arcu, vel ultrices lacus ligula sollicitudin tellus. Suspendisse id magna eget lacus aliquam vehicula non et mi. Curabitur elementum eu nibh eu aliquet. Mauris laoreet, dui ut tincidunt viverra, massa lacus ultricies augue, non ultricies enim enim non nunc. Curabitur pretium orci leo, sed egestas quam porttitor quis. Maecenas commodo neque a metus lobortis, quis laoreet odio volutpat. Phasellus viverra volutpat lectus ut hendrerit. Fusce vel ultrices dolor. Quisque finibus eget ligula nec elementum. Vivamus sit amet velit mollis, malesuada mauris sed, tincidunt sapien. Nulla facilisi. Mauris at lectus at libero tempor sollicitudin. Praesent finibus ligula a risus lacinia, nec vehicula orci vestibulum. Suspendisse potenti. Cras feugiat justo sit amet purus ullamcorper, in ultrices eros dignissim.</p>

<p>Nullam ac tempor mi. Maecenas tellus ante, porttitor sit amet est in, interdum venenatis magna. Mauris aliquet ut lacus eu volutpat. Vivamus at sapien quis lacus molestie dictum. Integer quis eros et mauris dictum sagittis vitae sed nunc. Cras varius molestie nulla, sed fermentum sem maximus lobortis. Aenean placerat id augue sit amet tincidunt. Pellentesque quis sodales neque. Duis lacinia ullamcorper dignissim. Duis a accumsan tortor, at pharetra ligula. Mauris lobortis leo in lacus suscipit faucibus. Sed non blandit dolor, sed consectetur mauris.</p>

<p>Nunc eu sapien purus. Aliquam eleifend justo non tortor mollis, sed tincidunt ex maximus. Quisque aliquet faucibus neque, nec auctor lectus condimentum id. Sed massa diam, viverra sodales egestas ut, interdum quis metus. Morbi sed pretium lacus, id efficitur dui. In faucibus, erat sit amet mollis facilisis, urna neque finibus augue, vel mollis eros libero in purus. Aliquam iaculis ac lorem a imperdiet. Donec et lorem dapibus, malesuada augue blandit, congue ipsum. Fusce sagittis diam vel justo rhoncus, eu fermentum libero dapibus. Cras quis volutpat orci, eget sollicitudin dui.</p>

<p>Integer eu metus id nibh euismod vulputate sit amet in sapien. Sed a augue porttitor lectus vestibulum consequat quis ut purus. Phasellus a felis dolor. Maecenas accumsan orci ex, a accumsan erat venenatis vel. Curabitur condimentum, ligula quis suscipit tincidunt, ipsum odio commodo felis, at ornare mauris neque ac elit. Integer suscipit faucibus varius. Donec dignissim sapien vitae massa tristique, sed accumsan massa vehicula. Nunc vel tincidunt libero. Morbi congue elit eros, sed mattis ex venenatis a. Mauris rutrum finibus risus hendrerit egestas. Curabitur dapibus volutpat mauris. Curabitur ligula augue, consequat in hendrerit et, suscipit vitae turpis. Pellentesque ornare non sem a cursus. In tincidunt diam mi, ut egestas mauris porttitor vel. Integer rutrum mollis nunc at finibus.</p>
  
  </div>
</div>
          
    </div>
    <footer class="footer">
      <div class="container">
        <span class="text-muted">WEBD 236 examples copyright &copy; 2019 <a href="https://www.franklin.edu/">Franklin University</a>. Current time is <?php echo(htmlentities(date('Y-m-d H:i:s T'))); ?></span>
      </div>
    </footer>
  </body>
</html> 