    <div class="container">
      <h2>陈涉少时，尝与人佣耕，辍耕之垄上，怅恨久之，曰：<br>「苟富贵，无相忘。」——《史记·陈涉世家》</h2>
      <div class="alert alert-info" style="padding: 20px 20px;">
        <h4>欢迎使用人大附中2013届出国学生录取结果统计系统！</h4>
        <ol>
          <li>此系统中提供的录取信息由用户生成、人工审核；欢迎大家踊跃提供自己所知的真实信息！</li>
          <li>学校信息摘自<a href="http://colleges.usnews.rankingsandreviews.com/best-colleges">US News 2012 大学排名</a>，信息为2011年版本。</li>
          <li>如有任何疑问，请单击页面底部的<span class="label label-success">Email me!</span>按钮。</li>
        </ol>
      </div>
      <div class="alert">
        <h4>出于隐私保护的目的，本系统目前不再公开提供录取结果详细内容展示。</h4>
        <p>录取结果以统计形式在首页显示；欢迎大家继续提供信息。</p>
      </div>
      <?php if (isset($isAuth) && !$isAuth): ?>
        <h2>输入口令以获取查看权限。</h2>
        <form action="/offer/index/auth" method="post" class="form-inline">
          <fieldset>
            <input type="password" name="passkey"></input>
            <button type="submit" class="btn btn-danger">Require Access</button>
          </fieldset>
        </form>
      <?php endif; ?>
      <div id="explorer"></div>
      <a class="btn btn-large btn-primary btn-block" href="/offer/add">添加新的录取结果</a>
    </div> <!-- /container -->
