<?php 
	 session_start();
	 include 'DB.php'; $pdo = Database::connect(); 
if (!isset($_SESSION["id_utilisateur"])) {header("Location:index.php");    }
$id_utilisateur=$_SESSION['id_utilisateur'];

	$sql = "select * from  utilisateur where id=$id_utilisateur";
    foreach ($pdo->query($sql) as $row){
		$id_utilisateur= $row['id'];
    	$nom=$row['Nom'];
    	$prenom=$row['Prenom'];
    	$tel=$row['telephone'];
    	$email=$row['email'];
    	$login=$row['login'];
		$password=$row['password'];
		$statu = $row['statut'];

	}
	
	if (isset($_POST['logout'])) {session_destroy();}

	if (isset($_POST['ok'])) {

		$salle_operation = $_POST['salle_operation'];
		$intitle_opertaion = $_POST['intitle_opertaion'];
		$date = $_POST['date'];
		$heure_depart = $_POST['heure_depart'];
		$heure_fin = $_POST['heure_fin'];
		$nom_patient = $_POST['nom_patient'];
		$maladie = $_POST['maladie'];
		$id_utilisateur=$_SESSION['id_utilisateur'];

		
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		$sql = "INSERT INTO blockreserve(salle_operation,date,heure_depart,heure_fin,nom_patient,maladie,intitle_operation,id_utilisateur) values(?,?,?,?,?,?,?,?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($salle_operation,$date,$heure_depart,$heure_fin,$nom_patient,$maladie,$intitle_opertaion,$id_utilisateur));	

		
	
	
	
		header("Location: accueil.php");
	}
	
?>

<!DOCTYPE html>
<html lang="fr">

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Accueil</title>
		<link rel="icon" type="image/png" sizes="16x16" href="assets/img/icon.png">
		
        <!-- Common Plugins -->
        <link href="assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- Vector Map Css-->
        <link href="assets/lib/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
		
		<!-- Chart C3 -->
		<link href="assets/lib/chart-c3/c3.min.css" rel="stylesheet">
		<link href="assets/lib/chartjs/chartjs-sass-default.css" rel="stylesheet">

        <!-- DataTables -->
        <link href="assets/lib/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
        <link href="assets/lib/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/lib/toast/jquery.toast.min.css" rel="stylesheet">
		
        <!-- Custom Css-->
        <link href="assets/scss/style.css" rel="stylesheet">
		<script>
		
		var today = new Date();

			var day = today.getDate();
			var month = today.getMonth() + 1;
			var year = today.getFullYear();

			if (day < 10) {
			day = '0' + day
			}
			if (month < 10) {
			month = '0' + month
			}

			var out = document.getElementById("output");

			out.innerHTML = day + "-" + month + "-" + year;

		</script>
       
</head>
    <body>

		<!-- ============================================================== -->
		<!-- 						Topbar Start 							-->
		<!-- ============================================================== -->
			<div class="top-bar light-top-bar">
			<div class="container-fluid">
				<div class="row">
					<div class="col">						
					<a class="admin-logo dark-logo" href="accueil.php">
							<h1>les blocks</h1>
					</a>
						<div class="left-nav-toggle" >
							<a  href="#" class="nav-collapse"><i class="fa fa-bars"></i></a>
						</div>
						<div class="left-nav-collapsed" >
							<a  href="#" class="nav-collapsed"><i class="fa fa-bars"></i></a>
						</div>
						<div class="search-form hidden-xs">
							<form>
								<input class="form-control" placeholder="Chercher ..." type="text"> <button class="btn-search" type="button"><i class="fa fa-search"></i></button>
							</form>
						</div>
						<ul class="list-inline top-right-nav">
							<li class="dropdown icons-dropdown d-none-m">
								<a class="dropdown-toggle " data-toggle="dropdown" href="#"><i class="fa fa-envelope"></i> <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div></a>
								
								<ul class="dropdown-menu top-dropdown lg-dropdown notification-dropdown">
									<li>
										<div class="dropdown-header">
											<a class="float-right" href="#"><small>View All</small></a> Messages
										</div>
										
										<div class="scrollDiv">
											<div class="notification-list">
												<a class="clearfix" href="javascript:%20void(0);">
													<span class="notification-icon">
														<img alt="" class="rounded-circle" src="assets/img/avtar-2.png" width="50">
													</span> 
													<span class="notification-title">
													John Doe 
													<label class="label label-warning float-right">Support</label>
													</span> 
													<span class="notification-description">Lorem Ipsum is simply dummy text of the printing.</span> 
													<span class="notification-time">15 minutes ago</span>
												</a>
												
												<a class="clearfix" href="javascript:%20void(0);">
													<span class="notification-icon">
													<img alt="" class="rounded-circle" src="assets/img/avtar-3.png" width="50">
													</span> 
													<span class="notification-title">
													Govindo Doe 
													<label class="label label-warning float-right">Support</label>
													</span> 
													<span class="notification-description">Lorem Ipsum is simply dummy text of the printing.</span> 
													<span class="notification-time">15 minutes ago</span>
												</a> 
												
												<a class="clearfix" href="javascript:%20void(0);">
													<span class="notification-icon">
													<img alt="" class="rounded-circle" src="assets/img/avtar-4.png" width="50">
													</span> 
													<span class="notification-title">
													Megan Doe 
													<label class="label label-warning float-right">Support</label>
													</span>
													<span class="notification-description">Lorem Ipsum is simply dummy text of the printing.</span>
													<span class="notification-time">15 minutes ago</span>
												</a> 
												
												<a class="clearfix" href="javascript:%20void(0);">
													<span class="notification-icon">
													<img alt="" class="rounded-circle" src="assets/img/avtar-5.png" width="50">
													</span>
													<span class="notification-title">
													Hritik Doe 
													<label class="label label-warning float-right">Support</label>
													</span>
													<span class="notification-description">Lorem Ipsum is simply dummy text of the printing.</span>
													<span class="notification-time">15 minutes ago</span>
												</a>
												
											</div>
										</div>
									</li>
								</ul>
							</li>
							<li class="dropdown icons-dropdown d-none-m">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-bell"></i> <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div></a>
								<ul class="dropdown-menu top-dropdown lg-dropdown notification-dropdown">
									<li>
										<div class="dropdown-header">
											<a class="float-right" href="#"><small>View All</small></a> Notifications
										</div>
										<div class="scrollDiv">
											<div class="notification-list">
											
												<a class="clearfix" href="javascript:%20void(0);">
													<span class="notification-icon">
														<i class="icon-cloud-upload text-primary"></i>
													</span>
													<span class="notification-title">Upload Complete</span> 
													<span class="notification-description">Lorem Ipsum is simply dummy text of the printing.</span>
													<span class="notification-time">15 minutes ago</span>
												</a> 
												
												<a class="clearfix" href="javascript:%20void(0);">
													<span class="notification-icon">
														<i class="icon-info text-warning"></i>
													</span>
													<span class="notification-title">Storage Space low</span>
													<span class="notification-description">Lorem Ipsum is simply dummy text of the printing.</span>
													<span class="notification-time">15 minutes ago</span>
												</a>
												
												<a class="clearfix" href="javascript:%20void(0);">
													<span class="notification-icon">
														<i class="icon-check text-success"></i>
													</span>
													<span class="notification-title">Project Task Complete</span>
													<span class="notification-description">Lorem Ipsum is simply dummy text of the printing.</span>
													<span class="notification-time">15 minutes ago</span>
												</a>
												
												<a class="clearfix" href="javascript:%20void(0);">
													<span class="notification-icon">
														<i class=" icon-graph text-danger"></i>
													</span>
													<span class="notification-title">CPU Usage</span>
													<span class="notification-description">Lorem Ipsum is simply dummy text of the printing.</span>
													<span class="notification-time">15 minutes ago</span>
												</a>
												
											</div>
										</div>
									</li>
								</ul>
							</li>
							
							<li class="dropdown avtar-dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									<img alt="" class="rounded-circle" src="assets/img/avtar-2.png" width="30">
									<?php echo $prenom; ?>
								</a>
								<ul class="dropdown-menu top-dropdown">
									<li>
										<a class="dropdown-item" href="javascript:%20void(0);"><i class="icon-bell"></i> Activitées</a>
									</li>
									<li>
										<a class="dropdown-item" href="profile.php"><i class="icon-user"></i> Profil</a>
									</li>
									<li>
										<a class="dropdown-item" href="javascript:%20void(0);"><i class="icon-settings"></i> Paramètres</a>
									</li>
									<li class="dropdown-divider"></li>
									<li>
										<a class="dropdown-item" href="index.php"><i class="icon-logout"></i>Déconnexion</a>									</li>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!--                        Topbar End                              -->
		<!-- ============================================================== -->
		
        <!-- ============================================================== -->
		<!-- 						Navigation Start 						-->
		<!-- ============================================================== -->
        <div class="main-sidebar-nav dark-navigation">
            <div class="nano">
                <div class="nano-content sidebar-nav">
				
					<div class="card-body border-bottom text-center nav-profile">
						<div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                        <img alt="profile" class="margin-b-10  " src="assets/img/avtar-2.png" width="80">
                        <p class="lead margin-b-0 toggle-none">Mr <?php echo $prenom; ?></p>
                        <p class="text-muted mv-0 toggle-none">Bonjour</p>						
                    </div>

					<ul class="metisMenu nav flex-column" id="menu">

						<li class="nav-item active">
							<a class="nav-link" href="accueil.php">
								<i class="fa fa-tachometer"></i> 
								<span class="toggle-none">Accueil</span>
							</a>
						</li>
						
                    </ul>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
		<!-- 						Navigation End	 						-->
		<!-- ============================================================== -->

			
		<!-- ============================================================== -->
		<!-- 						Content Start	 						-->
		<!-- ============================================================== -->
		<div class="row page-header no-background no-shadow margin-b-0">
				<div class="col-lg-6 align-self-center ">
				  <h2>Tableau de bord</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Accueil</a></li>
						<li class="breadcrumb-item active">Tableau de bord</li>
					</ol>
				</div>
				


		</div>
		
		<section class="main-content">

			<div class="row">
				<div class="col-sm-12">
					<div class="card">


						<?php
							if($statu == "adminstrateur"){
						?>
						<div class="card-body" style="width:100%">
					    <div class="row">
							<div class="col-md-12">	
                                <table id="datatable1" class="table table-striped dt-responsive nowrap table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                <strong>ID</strong>
                                            </th>
                                            <th class="text-center">
                                                <strong>salle operation</strong>
                                            </th>
                                            <th class="text-center">
                                                <strong>date</strong>
                                            </th>
											<th class="text-center" >
                                                <strong>plage horaire</strong>
                                            </th>
											<th class="text-center" >
                                                <strong>nom medecin </strong>
                                            </th>
                                            <th class="text-center" >
                                                <strong> nom du patient</strong>
                                            </th>
											<th class="text-center" >
                                                <strong>intitle operation</strong>
                                            </th>
                                            
                                            <th class="text-center">
                                                <strong>Actions</strong>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 

										$sql = "select * from blockreserve ";
													
										foreach ($pdo->query($sql) as $row) 
										{
												$id=$row['id_utilisateur'];
												$sql1 = "select * from  utilisateur where id=$id";
												foreach ($pdo->query($sql1) as $row1){

													$nom=$row1['Nom'];
													$prenom=$row1['Prenom'];
													$tel=$row1['telephone'];
													
												}
	


											echo '<tr>';
											echo '<td>'. $row['id'] . '</td>';
											echo '<td>'. $row['salle_operation'] . '</td>';
											echo '<td>'. $row['date'] . '</td>';	
											echo '<td> heure début :'.  $row['heure_depart']  . ' <br> heure fin :'.$row['heure_fin'] .'</td>';
											echo '<td> '.  $nom  . ' <br>'.$prenom .'<br>'.$tel.'</td>';

											echo "<td>". $row['nom_patient'] ."</td>";		
											
											echo '<td>'. $row['intitle_operation']  . '</td>';	
											echo"<td>
												<a href='block/deletereservation.php?val=".$id."'  >
												<button type='button'    class='btn btn-sm btn-danger' >
												
												<i class='fa fa-trash'></i>
												</button></a>
												</td></tr>";
												
										}						
										?>

									</tbody>
									</table>
								</div>
							</div>
						</div>

						<?php
							}else{
						?>
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header card-default">
										<div class="float-right mt-10">
											<a href="javascript: void(0);"  onclick="$('.batt').toggle()" class="btn btn-primary btn-rounded box-shadow btn-icon"><i class="fa fa-plus"></i> Réserver un block</a>
										</div>
										les réservation
										<p class="text-muted">Liste des réservation</p>
									</div>

									<div class="card-body batt" style="display: none;">
										<form method="post" >
											<div class="row">
												<div class="col-md-12">
													<div class="form-group  ">
														<label>block à réserve</label>
														<select name="salle_operation" class="form-control form-control-rounded">
															<option value="salles operation 1">salles operation 1</option>
															<option value="salles operation 2">salles operation 2</option>
															<option value="salles operation 3">salles operation 3</option>
															<option value="salles operation 4">salles operation 4</option>
														</select>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group  ">
														<label>Nom du responsable</label>
														<input type="text" name="nom_responsable" value='<?php echo "$nom" ?>' class="form-control form-control-rounded">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
															<label>prenom du responsable</label>
															<input type="text" name="prenom_responsable" value='<?php echo "$prenom" ?>' class="form-control form-control-rounded">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
															<label>intitle d'operation</label>
															<input type="text" name="intitle_opertaion" class="form-control form-control-rounded">
														
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label>date d'operation</label>
														<input type="date" id="output" name="date"   min="2019-01-01" max="2100-12-31" class="form-control form-control-rounded">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label>heure début d'operation</label>
														<input type="time" id="appt" name="heure_depart" class="form-control form-control-rounded" min="08:00" max="18:00" required>
													</div>												
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label>heure fin d'operation</label>
														<input type="time" id="appt" name="heure_fin" class="form-control form-control-rounded" min="08:00" max="18:00" required>
													</div>												
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>nom du  patient</label>
														<input type="text" name="nom_patient" class="form-control form-control-rounded">
													</div>	
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>maladie du patient</label>
														<input type="text" name="maladie" class="form-control form-control-rounded">
													</div>												
												</div>
												
												
												<div class="col-md-12 text-center">
													<div class="form-group">
														<input type="submit" name="ok" value="Réserver" width="500px" class="btn btn-sm btn-success">
													</div>
												</div>
											</div>      
										</form>
									</div>
								</div>
							</div>
						</div>


						

					<div class="card-body" style="width:100%">
					    <div class="row">
							<div class="col-md-12">	
                                <table id="datatable1" class="table table-striped dt-responsive nowrap table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                <strong>ID</strong>
                                            </th>
                                            <th class="text-center">
                                                <strong>salle operation</strong>
                                            </th>
                                            <th class="text-center">
                                                <strong>date</strong>
                                            </th>
											<th class="text-center" >
                                                <strong>plage horaire</strong>
                                            </th>
											<th class="text-center" >
                                                <strong>nom patient </strong>
                                            </th>
                                            <th class="text-center" >
                                                <strong>maladie</strong>
                                            </th>
											<th class="text-center" >
                                                <strong>intitle operation</strong>
                                            </th>
                                            
                                            <th class="text-center">
                                                <strong>Actions</strong>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 

										$sql = "select * from blockreserve where id_utilisateur=$id_utilisateur";
													
										foreach ($pdo->query($sql) as $row) 
										{
											$id=$row['id'];

											echo '<tr>';
											echo '<td>'. $row['id'] . '</td>';
											echo '<td>'. $row['salle_operation'] . '</td>';
											echo '<td>'. $row['date'] . '</td>';	
											echo '<td> heure début :'.  $row['heure_depart']  . ' <br> heure fin :'.$row['heure_fin'] .'</td>';
											echo "<td>". $row['nom_patient'] ."</td>";		
											echo '<td>'. $row['maladie']  . '</td>';
											echo '<td>'. $row['intitle_operation']  . '</td>';	
											echo"<td>
												<a href='block/deletereservation.php?val=".$id."'  >
												<button type='button'    class='btn btn-sm btn-danger' >
												
												<i class='fa fa-trash'></i>
												</button></a>
												</td></tr>";
												
										}						
										?>

									</tbody>
									</table>
								</div>
							</div>
						</div>

							
						</div>
					</div>
				</div>
				

				

			</section>
			<?php

				}
			?>
		</div>
		
        <section class="main-content">
            
            <footer class="footer">
                <span>Copyright &copy; 2018 @ kourmou.omar@gmail.com</span>
            </footer>

        </section>
        <!-- ============================================================== -->
		<!-- 						Content End		 						-->
		<!-- ============================================================== -->

		
         <!-- Common Plugins -->
		 <script src="assets/lib/jquery/dist/jquery.min.js"></script>
		<script src="assets/lib/bootstrap/js/popper.min.js"></script>
        <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/lib/pace/pace.min.js"></script>
        <script src="assets/lib/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
        <script src="assets/lib/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/lib/nano-scroll/jquery.nanoscroller.min.js"></script>
        <script src="assets/lib/metisMenu/metisMenu.min.js"></script>
        <script src="assets/js/custom.js"></script>
        <script src="assets/js/chartJs.custom.js"></script>
			
        <!--Chart Script-->
        <script src="assets/lib/chartjs/chart.min.js"></script>
		<script src="assets/lib/chartjs/chartjs-sass.js"></script>

		<!--Vetor Map Script-->
		<script src="assets/lib/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="assets/lib/vectormap/jquery-jvectormap-us-aea-en.js"></script>
		
		<!-- Chart C3 -->
        <script src="assets/lib/chart-c3/d3.min.js"></script>
        <script src="assets/lib/chart-c3/c3.min.js"></script>
	
        <!-- Datatables-->
        <script src="assets/lib/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/lib/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/lib/toast/jquery.toast.min.js"></script>
		<script src="assets/js/dashboard.js"></script>

		<!-- Radial Chart-->
        <script src="assets/lib/radial-charts/jquery.knob.js"></script>
        <script src="assets/lib/radial-charts/jquery.easypiechart.js"></script>
		<script src="assets/js/radial.custom.js"></script>

		
		
    </body>

</html>