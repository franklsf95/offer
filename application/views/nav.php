    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="brand" href="/offer">人大附中2013届出国生录取结果统计系统</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li<?php if ($page=='index'): ?> class="active"<?php endif; ?>><a href="/offer">查看录取统计</a></li>
              <li<?php if ($page=='school'): ?> class="active"<?php endif; ?>><a href="/offer/school">查看学校信息</a></li>
              <li<?php if ($page=='show'): ?> class="active"<?php endif; ?>><a href="/offer/index/show">查看详细结果</a></li>
              <li<?php if ($page=='add'): ?> class="active"<?php endif; ?>><a href="/offer/add">添加记录</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>