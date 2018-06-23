<?php
    require_once '../includes/classes/form.php';
    $form = new Form($_REQUEST['e_id']);
    $form_id = $form->f_id;
    // TODO: generalise the criteria class to include the part
    // TODO: replace the stub with an actual class and its methods
    function formStub(){
         echo '[
        {
            "c_id": 1,
            "s_id": 2,
            "heading": "Test Heading A",
            "description": "Description",
            "part": "A",
            "eval_level": 0,
            "numChildren": 0,
            "max_points":10,
            "value": 10
        },
        {
            "c_id": 2,
            "s_id": 5,
            "heading": "Research Papers Written",
            "description": "Papers Writtin in the academic year",
            "part": "A",
            "eval_level": 0,
            "numChildren": 2,
            "children": [
            {
                "c_id": 3,
                "s_id": 1,
                "heading": "Scopus Indexed",
                "description": "Scopus/Web of Science indexed publications",
                "value": 0,
                "max_points":10,
                "numChildren": 2,
                "children": [
                    {
                        "c_id": 3,
                        "s_id": 1,
                        "heading": "Papers with Authors In MIT",
                        "description": null,
                        "value": 20,
                        "max_points":10,
                        "numChildren": 0
                    },
                    {
                        "c_id": 5,
                        "s_id": -1,
                        "heading": "Papers with authors outside MIT",
                        "description": null,
                        "value": 0,
                        "max_points":10,
                        "numChildren": 0
                    }
                ]
            },
            {
                "c_id": 5,
                "s_id": -1,
                "heading": "Presented",
                "description": "papers presented in the academic year",
                "value": 0,
                "max_points":10,
                "numChildren": 0
            }
            ]
        },
        {
            "c_id": 3,
            "s_id": 2,
            "heading": "Test Heading C",
            "description": "Description",
            "part": "A",
            "eval_level": 0,
            "numChildren": 0,
            "max_points":10,
            "value": 10
        }
        ]';
    }

    formStub();
    // Temporary Stub
   

    
    
    





?>