    <div class="container">
      <form class="form-horizontal" action="/offer/add/submit" method="post">
        <fieldset>
          <legend>提交新信息</legend>
          <div class="control-group">
            <label class="control-label" for="input-person">姓名</label>
          <div class="controls">
              <input type="text" id="input-person" name="person">
          </div>
        </div>
          <label class="control-label" for="select-school">学校</label>
          <select name="school[]" id="select-school" class="s2 span4" multiple="multiple"></select>
          <div class="clearfix"></div>
          <input type="hidden" name="token" value="FOOOBAAR">
        </fieldset>
          <button type="submit" class="btn btn-primary offset2" style="margin-top: 20px;">Submit</button>
      </form>
      <hr>
      <h4>Duplication Check</h4>
      <output id="dup-check">
        <p>No record entered.</p>
      </output>
    </div> <!-- /container -->