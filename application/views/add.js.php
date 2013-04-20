    <script src="/offer/static/select2/select2.min.js"></script>
    <script>
    $p = $('#input-person');
    $s = $('#select-school');
    $d = $('#dup-check');
    $(function(){
    	loadSchools('all');
    });

    var checkDup = function(){
        $d.html('');
        person = $p.val();
        if (person == '') {
            $d.append('<li>You must first enter a name.</li>');
            return;
        }
        $.each($s.val(), function(k, v) {
            dupResult(person, v, function(isDup) {
                label = !isDup ? '<span class="label label-success"><i class="icon-ok icon-white"></i></span>'
                              : '<span class="label label-important"><i class="icon-remove icon-white"></i></span>'
                str   = isDup ? 'exists' : 'does not exist';
                school = $("#select-school option[value='" + v + "']").text();
                $d.append('<p>' + label + ' Record "' + person + ' => ' + school + '" ' + str + '</p>');
            });
        });
    };
    $s.change(checkDup);
    $p.change(checkDup);

    var dupResult = function(p, s, cb) {
        $.getJSON('/offer/ajax/recordExist/', {
            person: p,
            school: s
        }, function(data) {
            cb( data == '1' );
        });
    }

    var loadSchools = function(type) {
    	$.getJSON('/offer/ajax/getSchoolList/' + type, function(data) {
    		$.each(data, function(k, v) {
    			item = '<option value="' + v.id + '">' + v.name + '</option>';
    			$s.append(item);
    		});
    		$s.select2();
    	});
    }
    </script>