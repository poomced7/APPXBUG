<?php  $_SESSION['online'] = $token; ?>
    <nav class="navbar navbar-dark bg-success">
        <a href="/" class="navbar-brand">P.G.R. Machine</a>
        <button class="navbar-toggler ml-auto custom-toggler" type="button" data-toggle="collapse" data-target="#nav3">
            <span class="navbar-toggler-icon "style="color:#000";></span>
        </button>
        <div class="navbar-collapse collapse" id="nav3">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="?app=dashboard&token=<?php  $_SESSION['online'] = $token; ?>">หน้าแรก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">คะแนนของฉัน</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">ข้อมูลส่วนตัว</a>
                </li>
            </ul>
        </div>
    </nav>

  
