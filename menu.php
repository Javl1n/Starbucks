<?php
session_start();
//return to login if not logged in
if (!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
    header('location:index.php');
}

include('bootstrap.php');
include_once('User.php');

$user = new User();

//fetch user data
$sql = "SELECT * FROM users WHERE user_id = '" . $_SESSION['user'] . "'";
$row = $user->details($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <?php echo $bootstrap; ?>
</head>

<body>
    <header>
        <nav class="grid shadow">
            <div class="grid center">
                <ul class="flex">
                    <div class="grid grid-horizontal CAPS">
                        <li>
                            <a href="Home.php" class="logo">
                                <svg viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                    <title>starbucks</title>
                                    <path d="M25.332 13.605c2.154-0.747 3.568 1.392 5.23 0.893-1.655-1.446-2.707-3.546-2.749-5.893l-0-0.007c0.002-0.008 0.003-0.017 0.003-0.026 0-0.074-0.060-0.135-0.135-0.135-0.034 0-0.065 0.013-0.089 0.034l0-0c-0.828 0.604-1.405 1.509-1.57 2.55l-0.003 0.022c-0.607-0.409-1.355-0.653-2.16-0.653-0.511 0-0.999 0.098-1.446 0.277l0.026-0.009c1.143 0.807 2.103 1.785 2.866 2.908l0.025 0.039zM22.935 6.986c-1.078 0.062-2.053 0.461-2.833 1.091l0.009-0.007c0.343-0.965 0.773-1.801 1.296-2.567l-0.025 0.038c-1.339 0.097-2.529 0.664-3.421 1.535l0.001-0.001-0.668-1.75 1.482-1.309-1.984-0.14-0.792-1.846-0.792 1.846-1.984 0.14 1.482 1.309-0.667 1.75c-0.891-0.869-2.081-1.436-3.402-1.533l-0.018-0.001c0.497 0.728 0.926 1.564 1.245 2.451l0.024 0.078c-0.77-0.623-1.745-1.022-2.81-1.083l-0.013-0.001c0.633 0.789 1.192 1.683 1.641 2.639l0.034 0.081c0.027 0.069 0.093 0.117 0.17 0.117 0.036 0 0.070-0.010 0.098-0.029l-0.001 0c1.456-0.737 3.174-1.168 4.992-1.168s3.537 0.431 5.057 1.198l-0.065-0.029c0.027 0.018 0.061 0.028 0.097 0.028 0.077 0 0.143-0.048 0.169-0.116l0-0.001c0.483-1.037 1.042-1.931 1.696-2.747l-0.020 0.026zM13.35 12.232c0.231-0.144 0.511-0.229 0.811-0.229 0.269 0 0.522 0.069 0.742 0.189l-0.008-0.004c0.028-0.318-0.541-0.665-1.109-0.665-0.413 0-0.617 0.139-0.617 0.341 0 0.149 0.071 0.282 0.18 0.367l0.001 0.001zM18.214 11.524c-0.015-0.001-0.032-0.001-0.050-0.001-0.359 0-0.684 0.144-0.92 0.377l0-0c-0.011 0.034-0.018 0.074-0.018 0.115 0 0.052 0.011 0.101 0.029 0.146l-0.001-0.002c0.605-0.207 1.138-0.215 1.396 0.073 0.11-0.086 0.181-0.218 0.181-0.367v-0c0-0.201-0.205-0.341-0.617-0.341zM16 9.3c-0.051-0.003-0.111-0.005-0.172-0.005-1.209 0-2.245 0.738-2.682 1.789l-0.007 0.019c-0.023 0.078 0.008 0.128 0.098 0.088 0.239-0.105 0.517-0.167 0.809-0.167 0.012 0 0.024 0 0.036 0l-0.002-0c0.023-0.001 0.049-0.002 0.075-0.002 0.51 0 0.969 0.22 1.286 0.571l0.001 0.002c0.065 0.208 0.102 0.448 0.102 0.696 0 0.256-0.039 0.502-0.113 0.733l0.005-0.017c-0.234-0.052-0.318-0.233-0.546-0.233s-0.405 0.16-0.792 0.16c-0.386 0-0.432-0.183-0.686-0.183-0.299 0-0.354 0.308-0.354 0.656 0 1.55 1.424 3.682 2.939 3.682s2.939-2.132 2.939-3.682c0-0.348-0.072-0.645-0.384-0.686-0.162 0.133-0.371 0.214-0.599 0.214-0.020 0-0.039-0.001-0.059-0.002l0.003 0c-0.387 0-0.494-0.16-0.722-0.16-0.275 0-0.248 0.58-0.574 0.613-0.111-0.287-0.175-0.618-0.175-0.965 0-0.296 0.047-0.58 0.133-0.847l-0.005 0.019c0.319-0.352 0.777-0.572 1.288-0.572 0.026 0 0.052 0.001 0.078 0.002l-0.004-0c0.010-0 0.022-0 0.035-0 0.292 0 0.57 0.061 0.822 0.172l-0.013-0.005c0.090 0.040 0.122-0.010 0.098-0.088-0.444-1.069-1.48-1.808-2.688-1.808-0.060 0-0.12 0.002-0.18 0.005l0.008-0zM9.56 10.657c-0.421-0.169-0.908-0.267-1.419-0.267-0.805 0-1.553 0.244-2.174 0.662l0.014-0.009c-0.168-1.064-0.745-1.969-1.561-2.565l-0.011-0.008c-0.024-0.021-0.055-0.033-0.089-0.033-0.074 0-0.135 0.060-0.135 0.135 0 0.009 0.001 0.018 0.003 0.027l-0-0.001c-0.042 2.354-1.094 4.455-2.74 5.892l-0.009 0.008c1.661 0.499 3.076-1.64 5.23-0.893 0.788-1.162 1.748-2.14 2.856-2.924l0.035-0.024zM30.959 16.94q-0.028 0.534-0.095 1.064c-1.696 0.281-2.302-1.23-4.039-1.155 0.088 0.295 0.176 0.676 0.244 1.063l0.009 0.065c1.433-0.001 2.010 1.338 3.604 1.141q-0.126 0.614-0.301 1.212c-1.26 0.124-1.704-1.129-3.163-1.094q0.018 0.311 0.018 0.629l-0.006 0.35 2.832 1.081q-0.222 0.602-0.495 1.183c-0.851-0.047-1.145-1.139-2.44-1.052q-0.058 0.418-0.147 0.83c1.125-0.079 1.367 0.957 2.173 1.041q-0.308 0.561-0.662 1.094c-0.477-0.256-0.891-1.027-1.797-1.075q0.14-0.431 0.243-0.873c-0.966-0.020-1.84-0.402-2.493-1.016l0.002 0.002c0.25-1.421-1.956-2.868-1.956-3.909 0-1.131 0.572-1.756 0.572-3.28-0.043-1.25-0.561-2.372-1.378-3.197l0 0c-0.151-0.154-0.319-0.291-0.502-0.406l-0.011-0.007c0.794 0.891 1.295 2.059 1.345 3.342l0 0.010c0 1.435-0.668 2.193-0.668 3.517s1.938 2.47 1.938 3.836c-0.063 0.788-0.33 1.504-0.747 2.107l0.009-0.014c0.7 0.737 1.651 1.23 2.715 1.341l0.019 0.002c0.018 0.003 0.038 0.004 0.059 0.004 0.176 0 0.326-0.107 0.389-0.26l0.001-0.003q0.11-0.241 0.208-0.488c0.787 0.031 1.148 0.746 1.584 1.032q-0.359 0.482-0.754 0.931c-0.313-0.45-0.74-0.8-1.241-1.012l-0.019-0.007q-0.154 0.3-0.326 0.59c0.461 0.207 0.836 0.539 1.090 0.952l0.006 0.011q-0.424 0.439-0.883 0.843c-0.215-0.351-0.49-0.644-0.813-0.873l-0.009-0.006q-0.185 0.25-0.384 0.488c0.285 0.222 0.519 0.495 0.69 0.807l0.007 0.014c-0.354 0.284-0.719 0.553-1.098 0.804-0.187-1.521-2.264-2.564-1.704-4.329-0.229 0.328-0.376 0.729-0.403 1.162l-0 0.007c0 1.278 1.361 2.292 1.47 3.562q-0.423 0.253-0.865 0.478c-0.049-1.396-1.49-2.923-1.49-4.069 0-1.279 1.675-2.563 1.675-4.073 0-1.511-1.932-2.556-1.932-3.883s0.822-2.088 0.822-3.787c-0.020-1.314-0.595-2.489-1.5-3.305l-0.004-0.004c-0.149-0.135-0.317-0.253-0.499-0.349l-0.013-0.007c0.842 0.878 1.361 2.071 1.361 3.386 0 0.002 0 0.005 0 0.007v-0c0 1.597-0.942 2.484-0.942 4.048s1.896 2.434 1.896 3.893-1.765 2.687-1.765 4.185c0 1.363 1.556 2.723 1.579 4.34q-0.512 0.223-1.039 0.406c0.198-1.633-1.554-3.318-1.554-4.651 0-1.457 1.831-2.71 1.831-4.28 0-1.572-1.862-2.303-1.862-3.916 0-1.612 1.142-2.505 1.142-4.287-0.008-1.385-0.663-2.615-1.677-3.404l-0.010-0.007-0.064-0.048c-0.094-0.070-0.172 0.014-0.105 0.097 0.678 0.793 1.090 1.831 1.090 2.965 0 0.050-0.001 0.099-0.002 0.148l0-0.007c0 1.63-1.312 2.954-1.312 4.533 0 1.864 1.762 2.396 1.762 3.925s-1.889 2.751-1.889 4.374c0 1.505 1.788 3.175 1.481 4.913q-0.541 0.141-1.091 0.24c0.336-2.163-1.418-3.717-1.418-5.132 0-1.532 1.956-2.898 1.956-4.395 0-1.412-1.404-1.874-1.589-3.318-0.014-0.176-0.16-0.313-0.338-0.313-0.023 0-0.045 0.002-0.067 0.007l0.002-0c-0.361 0.126-0.778 0.211-1.211 0.239l-0.014 0.001c-0.447-0.029-0.865-0.114-1.259-0.25l0.034 0.010c-0.019-0.004-0.041-0.006-0.064-0.006-0.178 0-0.324 0.137-0.338 0.312l-0 0.001c-0.184 1.445-1.589 1.906-1.589 3.318 0 1.497 1.957 2.862 1.957 4.395 0 1.415-1.754 2.969-1.419 5.132q-0.55-0.1-1.091-0.24c-0.307-1.737 1.482-3.408 1.482-4.913 0-1.623-1.889-2.846-1.889-4.374s1.762-2.062 1.762-3.925c0-1.579-1.312-2.903-1.312-4.533-0.001-0.042-0.002-0.091-0.002-0.141 0-1.134 0.413-2.172 1.096-2.972l-0.005 0.006c0.066-0.083-0.011-0.167-0.106-0.097l-0.063 0.048c-1.024 0.796-1.678 2.026-1.686 3.408v0.001c0 1.782 1.142 2.674 1.142 4.287s-1.862 2.344-1.862 3.916c0 1.571 1.831 2.823 1.831 4.28 0 1.333-1.751 3.018-1.553 4.651q-0.527-0.184-1.040-0.406c0.023-1.617 1.578-2.978 1.578-4.34 0-1.498-1.764-2.727-1.764-4.185s1.896-2.328 1.896-3.893c0-1.564-0.941-2.451-0.941-4.048 0-0.002 0-0.005 0-0.007 0-1.315 0.518-2.508 1.362-3.387l-0.002 0.002c-0.195 0.102-0.363 0.221-0.514 0.357l0.002-0.002c-0.91 0.819-1.485 1.995-1.504 3.305l-0 0.003c0 1.699 0.822 2.461 0.822 3.786 0 1.326-1.932 2.372-1.932 3.883 0 1.51 1.675 2.794 1.675 4.073 0 1.146-1.442 2.673-1.491 4.069q-0.44-0.225-0.865-0.478c0.109-1.27 1.47-2.284 1.47-3.562-0.027-0.44-0.174-0.841-0.408-1.176l0.005 0.007c0.56 1.765-1.517 2.808-1.704 4.329q-0.567-0.377-1.098-0.804c0.178-0.326 0.412-0.599 0.691-0.816l0.006-0.004q-0.2-0.238-0.384-0.488c-0.333 0.234-0.608 0.527-0.816 0.866l-0.007 0.013q-0.458-0.404-0.882-0.843c0.26-0.424 0.634-0.756 1.080-0.957l0.015-0.006q-0.172-0.29-0.326-0.59c-0.519 0.219-0.947 0.569-1.253 1.010l-0.006 0.009q-0.395-0.451-0.753-0.931c0.436-0.286 0.796-1.002 1.583-1.032q0.099 0.246 0.208 0.488c0.064 0.155 0.215 0.263 0.39 0.263 0.021 0 0.041-0.002 0.061-0.004l-0.002 0c1.083-0.113 2.034-0.606 2.732-1.341l0.002-0.002c-0.408-0.589-0.675-1.304-0.737-2.078l-0.001-0.015c0-1.365 1.938-2.511 1.938-3.836s-0.668-2.082-0.668-3.517c0.050-1.293 0.551-2.46 1.35-3.357l-0.005 0.005c-0.194 0.122-0.362 0.259-0.513 0.413l-0.001 0.001c-0.816 0.825-1.334 1.946-1.377 3.188l-0 0.008c0 1.524 0.572 2.15 0.572 3.28 0 1.041-2.206 2.488-1.957 3.909-0.652 0.612-1.525 0.994-2.488 1.014l-0.004 0q0.105 0.441 0.243 0.873c-0.905 0.048-1.319 0.82-1.797 1.075q-0.354-0.533-0.662-1.094c0.806-0.084 1.048-1.119 2.174-1.041q-0.089-0.412-0.148-0.83c-1.295-0.087-1.589 1.006-2.44 1.052q-0.273-0.581-0.495-1.183l2.833-1.081-0.006-0.35c0-0.212 0.006-0.421 0.018-0.629-1.459-0.034-1.903 1.218-3.163 1.094q-0.175-0.599-0.301-1.211c1.593 0.197 2.171-1.142 3.604-1.141 0.077-0.452 0.165-0.833 0.272-1.205l-0.019 0.077c-1.737-0.075-2.344 1.436-4.039 1.155q-0.067-0.53-0.095-1.064c1.971 0.22 2.71-1.4 4.505-1.202 0.196-0.493 0.393-0.902 0.615-1.296l-0.027 0.053c-2.25-0.396-3.014 1.486-5.108 1.197 0.239-8.088 6.852-14.553 14.975-14.553s14.738 6.466 14.975 14.533l0 0.022c-2.095 0.289-2.859-1.592-5.108-1.197 0.194 0.34 0.391 0.749 0.562 1.172l0.026 0.071c1.794-0.199 2.533 1.422 4.504 1.202zM16 14.107c-0.182 0-0.222-0.069-0.347-0.068-0.156 0.011-0.295 0.078-0.398 0.181l-0 0c0.003 0.046 0.022 0.087 0.052 0.118l-0-0c0.266 0.040 0.386 0.188 0.694 0.188s0.427-0.148 0.694-0.188c0.029-0.031 0.048-0.072 0.051-0.118l0-0.001c-0.103-0.103-0.242-0.171-0.397-0.181l-0.002-0c-0.125-0.001-0.165 0.068-0.347 0.068zM14.913 15.032c-0.046 0.018-0.082 0.053-0.1 0.097l-0 0.001c0.314 0.242 0.531 0.792 1.187 0.792s0.873-0.55 1.187-0.792c-0.018-0.046-0.054-0.081-0.099-0.098l-0.001-0c-0.302 0.062-0.649 0.098-1.004 0.098-0.029 0-0.058-0-0.087-0.001l0.004 0c-0.025 0-0.054 0.001-0.083 0.001-0.355 0-0.702-0.036-1.037-0.103l0.033 0.006zM17.506 7.614c-0.453-0.083-0.974-0.13-1.506-0.13s-1.054 0.047-1.56 0.138l0.053-0.008c-0.075 0.013-0.104-0.060-0.047-0.103 0.052-0.038 1.553-1.181 1.553-1.181l1.552 1.181c0.059 0.043 0.030 0.117-0.045 0.103z"></path>
                                </svg>
                            </a>
                        </li>
                        <li class="active">
                            <a href="menu.php">
                                Menu
                            </a>
                        </li>
                        <li>
                            <?php
                            $user = $row['administration_priveleges'];
                            if ($user == 1) {
                                echo "<a href='Manage.php'>Manage</a>";
                            }
                            ?>
                        </li>
                    </div>
                    <div class="grid grid-horizontal">
                        <li>
                            <a href="profile.php">
                                <?php echo $row['username']; ?>
                            </a>
                        </li>
                        <li>
                            <button class="nav-button red-button">
                                <a href="logout.php">
                                    logout
                                </a>
                            </button>
                        </li>
                    </div>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="grid">
            <div class="grid">
                <h1>Drinks</h1>
                <ul>
                    <li>
                        <a href="">Oleato</a>
                    </li>
                </ul>
            </div>
            <div class="grid">
                <h1>Menu</h1>
                <h2>Drinks</h2>
                <HR>
                </HR>

            </div>
            <div>

            </div>
        </div>
    </main>
</body>

</html>