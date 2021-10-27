<style>
    .question_row{
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;
    }
    .question_row > [class*='col-'] {
        display: flex;
        flex-direction: column;
    }
    #treatment input.form-control{
        height: 30px;
        font-size: 14px;
    }
    .control-label{
        font-size: 15px;
    }

</style>

<div class="form_container">
    <?php
    $c = array();
    foreach($comments as $key => $cm){
        foreach($cm as $k => $cm1)
        $c = array_merge($c,array($cm->{$k}));
    }
    function append_subcategories($question_options, $option)
    {
        $id = $option->parent_option_id;
        if (isset($question_options[$option->parent_option_id])) {
            if (isset($question_options[$option->parent_option_id]['sub_categories'][$option->option_id])) {
                array_push($question_options[$id]['sub_categories'][$option->option_id], (array)$option);
            } else {
                $question_options[$option->parent_option_id]['sub_categories'][$option->option_id] = (array)$option;
            }
        } else {
            if (is_array($question_options)) {
                foreach ($question_options as $key => $qo) {
                    $question_options[$key] = append_subcategories($qo, $option);
                }
            }
        }
        return $question_options;
    }

    function print_sub_cates($options, $level, $q_id, $key,$id,$answers,$result_option)
    {

        foreach ($options as $option) {
            echo str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", $level)
            ?>
            <input type="radio" name="question_<?php echo $q_id . "_" . $key ?>" <?php echo(in_array($option['option_id'],$answers)||in_array($option['option_id'],$result_option)?"checked":"")?>
                   value="<?php echo $option['option_id'] ?>" disabled><?php echo $option['option'] ?><br/>
            <div>
                <?php if (isset($option['sub_categories'])) {
                    print_sub_cates($option['sub_categories'], ++$level, $q_id . "_" . $option['option_id'], $key,$option['option_id'],$answers,$result_option);
                    --$level;
                }?>
            </div>
        <?php } ?>
    <?php } ?>
    <form >
        <div class="row">
            <div class="col-sm-8 col-centered row">
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Patient Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="patient_name" name="patient_name"
                                   placeholder="Patient Name" value="<?php echo $patient_name; ?>">
                        </div>
                    </div>
                </div>

                <div class="row"> 
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Patient Age:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="patient_age" name="patient_age"
                                   placeholder="Patient Age" value="<?php echo $patient_age; ?>">
                        </div>
                    </div>
                </div>

                <div class="row"> 
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Sex:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="patient_sex" name="patient_sex"
                                   placeholder="Patient Sex" value="<?php echo $patient_sex;?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $i = 1;
        foreach ($questions as $question) {
            $categories = array(); ?>
            <div class="row question_row">
                <div class="col-sm-12 col-centered">

                    <div class="question"><?php echo $i . ". " . $question->question ?></div>
                    <div class="options">
                        <div class="row">
                            <?php $options = (array)json_decode('[' . $question->sub_options . ']');
                            $question_options = array();
                            foreach ($options as $option) {
                                if (!in_array($option->category, $categories)) {
                                    array_push($categories, $option->category);
                                }
                                if ($option->category == '') {
                                    $option->category = "nocats";
                                }
                                if ($option->parent_option_id == 0) {
                                    $question_options[$option->category][$option->option_id] = (array)$option;
                                } else {
                                    $question_options[$option->category] = append_subcategories($question_options[$option->category], $option);
                                }
                            }
                            foreach ($question_options as $key => $cats) {
                                if ($key == 'nocats') {
                                    foreach ($cats as $option) {
                                        ?>
                                        <div class="col-sm-3">
                                            <label class="radio-inline">
                                                <input disabled type="radio" <?php echo(in_array($option['option_id'],$answers)||in_array($option['option_id'],$result_option)?"checked":"")?>
                                                       name="question_<?php echo $question->id . "_" . $key ?>"
                                                       id="question_<?php echo $question->id . "_" . $key ?>"
                                                       value="<?php echo $option['option_id'] ?>"><?php echo $option['option'] ?>
                                                <br/>
                                                <div>
                                                    <?php if (isset($option['sub_categories'])) {
                                                        print_sub_cates($option['sub_categories'], 1, $question->id . "_" . $option['option_id'], $key,$option['option_id'],$answers,$result_option);
                                                    } ?>
                                                </div>

                                            </label>
                                        </div>

                                    <?php }
                                } else {
                                    $count = count($question_options);
                                    $cols = 12 / $count;
                                    $size = "col-sm-" . $cols;
                                    echo "<div class=" . $size . ">";
                                    foreach ($cats as $option) {
                                        ?>
                                        <div class="col-sm-12">
                                            <label class="radio-inline">
                                                <input disabled type="radio" <?php echo(in_array($option['option_id'],$answers)||in_array($option['option_id'],$result_option)?"checked":"")?>
                                                       name="question_<?php echo $question->id . "_" . $key ?>"
                                                       value="<?php echo $option['option_id'] ?>"><?php echo $option['option'] ?>
                                                <br/><div>
                                                    <?php if (isset($option['sub_categories'])) {
                                                        print_sub_cates($option['sub_categories'], 1, $question->id . "_" . $option['option_id'], $key,$option['option_id'],$answers,$result_option);
                                                    } ?>
                                                </div>
                                            </label>
                                        </div>
                                    <?php }
                                    echo "</div>";
                                }
                            } ?>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" id="" disabled><?php echo ($c[$question->id]);?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="option-seprator"/>
            <?php $i++;
        } ?>
    </form>
</div>