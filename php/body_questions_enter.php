<div class="container margin-block">
  <form class="form-horizontal container" enctype="multipart/form-data" method="post" id='question_form' name='question_form' onSubmit='if (validate_question_form(this)) question_send_ajax(this);' action="javascript:void(null);">
        <div class="form-group">
            <label class="col-sm-3 col-md-3 col-xl-3 col-lg-3 control-label">Question:</label>
            <div class="col-sm-8 col-md-8 col-xl-8 col-lg-8">
              <textarea rows="3" type="text" class="form-control" placeholder="Question" name="question" onkeyup="validate_question(this)" onchange="validate_question(this)" onblur="validate_question(this)"  data-toggle="tooltip" data-placement="right" title="Write a question correct" onmouseover="_tooltip_over(this)" onmouseover="_tooltip_out(this)"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 col-md-3 col-xl-3 col-lg-3 control-label">Answer:</label>
            <div class="col-sm-8 col-md-8 col-xl-8 col-lg-8">
              <input type="text" class="form-control" placeholder="Answer" name="answer" onkeyup="validate_answer(this)" onchange="validate_answer(this)" onblur="validate_answer(this)" data-toggle="tooltip" data-placement="right" title="Write an answer" onmouseover="_tooltip_over(this)" onmouseover="_tooltip_out(this)">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 col-md-3 col-xl-3 col-lg-3 control-label">Subject:</label>
            <div class="col-sm-8 col-md-8 col-xl-8 col-lg-8">
              <select class="form-control" name="subject">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 col-md-3 col-xl-3 col-lg-3 control-label">Complexity:</label>
            <div class="col-sm-8 col-md-8 col-xl-8 col-lg-8">
              <select class="form-control" name="complexity">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-8 col-md-8 col-xl-8 col-lg-8">
              <button type="submit" class="btn btn-default">Enter question</button>
            </div>
        </div>
    </form>
</div>