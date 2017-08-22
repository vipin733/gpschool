<?php


Route::get('/', 'AuthControllerg@login');

Auth::routes();
Route::group(['middleware' => 'revalidate'],function(){

  Route::get('/home', 'HomeController@index');
  Route::get('/analysis/bar', 'Analysis\AnalysisController@AnalysisBar');
  Route::get('/analysis/line', 'Analysis\AnalysisController@AnalysisLine');
  Route::get('/analysis/radar', 'Analysis\AnalysisController@AnalysisRadar');
  Route::get('/analysis/polar', 'Analysis\AnalysisController@AnalysisPolar');
  Route::get('/analysis/pie', 'Analysis\AnalysisController@AnalysisPie');
  Route::get('/analysis/doughnut', 'Analysis\AnalysisController@AnalysisDoughnut');


  Route::get('/filtergraph/pie','TestingController@pie');
  Route::get('/filtergraph/pie/year','TestingController@yearpie');
  Route::get('/filtergraph/pie/courses','TestingController@coursespie');

  Route::get('/filtergraph/doughnut/year','TestingController@yeardoughnut');
  Route::get('/filtergraph/doughnut/courses','TestingController@coursesdoughnut');

  Route::get('/filtergraph/polar/year','TestingController@yearpolar');
  Route::get('/filtergraph/polar/courses','TestingController@coursespolar');

  Route::get('/filtergraph/line/year','Analysis\AnalysisLineController@yearline');
  Route::get('/filtergraph/line/courses','Analysis\AnalysisLineController@coursesline');
  Route::get('/filtergraph/line/course/combined','Analysis\AnalysisLineController@combinedcourseline');
  Route::get('/filtergraph/line/year/combined','Analysis\AnalysisLineController@combinedyearline');

  Route::get('/filtergraph/bar/year','Analysis\AnalysisBarController@yearbar');
  Route::get('/filtergraph/bar/courses','Analysis\AnalysisBarController@coursesbar');
  Route::get('/filtergraph/bar/course/combined','Analysis\AnalysisBarController@combinedcoursebar');
  Route::get('/filtergraph/bar/year/combined','Analysis\AnalysisBarController@combinedyearbar');

  Route::get('/filtergraph/radar/year','Analysis\AnalysisRadarController@yearradar');
  Route::get('/filtergraph/radar/courses','Analysis\AnalysisRadarController@coursesradar');
  Route::get('/filtergraph/radar/course/combined','Analysis\AnalysisRadarController@combinedcourseradar');
  Route::get('/filtergraph/radar/year/combined','Analysis\AnalysisRadarController@combinedyearradar');


  Route::get('/create-students', 'StudentsController@create');
  Route::post('/create-students', 'StudentsController@Store');

  Route::get('/student/{reg_no}', 'StudentsController@show');
  Route::get('/student/{reg_no}/edit', 'StudentsController@edit');
  Route::patch('/student/{reg_no}/update', 'StudentsController@update');
  Route::patch('/student/{s}/avatar', 'StudentsController@update_avatar');

  Route::resource('fee_structure/tutions','Add\AddTutionFeeController',['only'=>['create','store','update','destroy']]);
  Route::resource('fee_structure/transports','Add\AddTransportFeeController',['only'=>['create','store','update','destroy']]);
  Route::resource('fee_structure/registrations','Add\RegistrationFeeController',['only'=>['create','store','update','destroy']]);


  Route::get('/search/unpaid/students/tution','Unpaid\UnpaidTutionStudentsController@unpaid_tution');
  Route::get('/search/unpaid/students_ajax/tution','Unpaid\UnpaidTutionStudentsController@unpaid_tution_ajax');

  Route::get('/student/{reg_no}/tution_fee/take', 'Fee\TutionFeeCollectionController@tution_fee_get');
  Route::post('/student/{reg_no}/tution_fee/take', 'Fee\TutionFeeCollectionController@tution_fee_post');
  Route::get('/student/{reg_no}/tution_fee/details', 'Fee\TutionFeeCollectionController@fee_detail_tution');
  Route::get('/student/{reg_no}/{tution_fee}/tution/reciept', 'Fee\TutionFeeCollectionController@tution_reciept');
  Route::PATCH('/student/{tutionfee}/tution_fee/delete', 'Fee\TutionFeeCollectionController@delete_tution')->name('tution.destroy');



  Route::get('/search/unpaid/students/transport','Unpaid\UnpaidTansportStudentsController@unpaid_trans');
  Route::get('/search/unpaid/students_ajax/transport','Unpaid\UnpaidTansportStudentsController@unpaid_trans_ajax');

  Route::get('/student/{reg_no}/transport_fee/take', 'Fee\TransportFeeCollectionController@transport_fee_get');
  Route::post('/student/{reg_no}/transport_fee/take', 'Fee\TransportFeeCollectionController@transport_fee_post');
  Route::get('/student/{reg_no}/transport_fee/details', 'Fee\TransportFeeCollectionController@fee_detail_transport');
  Route::get('/student/{reg_no}/{transport_fee}/transport/reciept', 'Fee\TransportFeeCollectionController@transport_reciept');
  Route::PATCH('/student/{transport_fee}/transport_fee/delete', 'Fee\TransportFeeCollectionController@delete_transport')->name('transport.destroy');



  Route::get('/search/unpaid/students/registration','Unpaid\UnpaidRegistrationStudentsController@unpaid_registration');
  Route::get('/search/unpaid/students_ajax/registration','Unpaid\UnpaidRegistrationStudentsController@unpaid_registration_ajax');

  Route::get('/student/{reg_no}/registration_fee/take', 'Fee\RegistraionFeeCollectionController@registration_fee_get');
  Route::post('/student/{reg_no}/registration_fee/take', 'Fee\RegistraionFeeCollectionController@registration_fee_post');
  Route::get('/student/{reg_no}/registration_fee/details', 'Fee\RegistraionFeeCollectionController@fee_detail_registration');
  Route::get('/student/{reg_no}/{registrationfee_fee}/registration/reciept', 'Fee\RegistraionFeeCollectionController@registration_reciept');
  Route::PATCH('/student/{registration_fee}/registration_fee/delete', 'Fee\RegistraionFeeCollectionController@delete_registration')->name('registration.destroy'); 

  Route::get('/create-teachers', 'TeachersController@create');
  Route::post('/create-teachers', 'TeachersController@Store');
  Route::get('/teacher/{reg_no}', 'TeachersController@show');
  Route::get('/teacher/{reg_no}/edit', 'TeachersController@edit');
  Route::patch('/teacher/{reg_no}/update', 'TeachersController@update');
  Route::patch('/teacher/{reg_no}/avatar', 'TeachersController@update_avatar');

  Route::get('/search/all_students', 'SearchStudentController@searchstudent');
  Route::get('/search/all_students/ajax', 'SearchStudentController@searchstudent_ajax');

  Route::get('/all-students', 'SearchStudentController@home');
  Route::get('/all-students/ajax', 'SearchStudentController@home_ajax');

  Route::get('/search/all_students/stopage_wise', 'SearchStudentController@stopage_wise');
  Route::get('/search/all_students/stopage_wise/ajax', 'SearchStudentController@stopage_wise_ajax');


  Route::get('/search/all_teachers', 'SearchTeachersController@home');
  Route::get('/search/all_teachers/ajax', 'SearchTeachersController@home_ajax');
 

  Route::resource('acadmic/asessions','Add\AddAsessionController',['only'=>['create','store','update']]);
  Route::resource('acadmic/courses','Add\AddCourseController',['only'=>['create','store','update']]);
  Route::resource('acadmic/sections','Add\AddSectionController',['only'=>['create','store','update']]);
  Route::resource('acadmic/cities','Add\AddCityController',['only'=>['create','store','update']]);
  Route::resource('acadmic/states','Add\AddStateController',['only'=>['create','store','update']]);
  Route::resource('acadmic/subjects','Add\AddSubjectController',['only'=>['create','store','update']]);
  Route::resource('acadmic/busdetails','Add\AddBusDetailController',['only'=>['create','store','update']]);
  Route::resource('acadmic/stopages','Add\AddStopagesController',['only'=>['create','store','update']]);

Route::get('/acadmic/course_section/attach', 'CourseSectionAcadmicController@course_section_get');
Route::post('/acadmic/course_section/attach', 'CourseSectionAcadmicController@course_section_post');

Route::get('/acadmic/section_student/courses_link', 'StudentAcadmicController@courses_for_students_sections');
Route::get('/acadmic/section_student/{course}/{created_at}/attach', 'StudentAcadmicController@section_student_get');
Route::post('/acadmic/section_student/{course}/{created_at}/attach', 'StudentAcadmicController@section_student_post');


  Route::get('/acadmic/transactions/tution','Fee\Transaction\TutionTransactionsController@tutions_transactions');
  Route::get('/acadmic/transactions/tution/ajax','Fee\Transaction\TutionTransactionsController@tutions_transactions_ajax');


Route::get('/acadmic/transactions/transport','Fee\Transaction\TransportTransactionsController@transport_transactions');
Route::get('/acadmic/transactions/transport/ajax','Fee\Transaction\TransportTransactionsController@transport_transactions_ajax');

  Route::get('/acadmic/transactions/registration','Fee\Transaction\RegistrationTransactionsController@registraion_transactions');
  Route::get('/acadmic/transactions/registration/ajax','Fee\Transaction\RegistrationTransactionsController@registraion_transactions_ajax');


  Route::get('/acadmic/delete/transactions/tution','Fee\Deleted\DeleteTutionTransactionsController@delete_tutions_transactions');
  Route::get('/acadmic/delete/transactions/tution/ajax','Fee\Deleted\DeleteTutionTransactionsController@delete_tutions_transactions_ajax');

 Route::get('/acadmic/delete/transactions/transport','Fee\Deleted\DeleteTransportTransactionsController@delete_transports_transactions');
  Route::get('/acadmic/delete/transactions/transport/ajax','Fee\Deleted\DeleteTransportTransactionsController@delete_transports_transactions_ajax');

   Route::get('/acadmic/delete/transactions/registration','Fee\Deleted\DeleteRegistrationTransactionsController@delete_registrations_transactions');
  Route::get('/acadmic/delete/transactions/registration/ajax','Fee\Deleted\DeleteRegistrationTransactionsController@delete_registrations_transactions_ajax');

  Route::get('/acadmic/{reg_no}/c_c','CharCerticficateController@chare_certi_get');
  Route::post('/acadmic/{s}/c_c','CharCerticficateController@chare_certi_post');
  Route::get('/acadmic/{reg_no}/c_c/{c}/edit','CharCerticficateController@chare_certi_edit');
  Route::patch('/acadmic/{c}/c_c/update','CharCerticficateController@chare_certi_update');
  Route::get('/acadmic/{reg_no}/c_c_view','CharCerticficateController@chare_certi_view');


  Route::get('/acadmic/{reg_no}/t_c','TcCerticficateController@trans_certi_get');
  Route::post('/acadmic/{s}/t_c','TcCerticficateController@trans_certi_post');
  Route::get('/acadmic/{reg_no}/t_c/{t}/edit','TcCerticficateController@trans_certi_edit');
  Route::patch('/acadmic/{t}/t_c/update','TcCerticficateController@trans_certi_update');
  Route::get('/acadmic/{reg_no}/t_c_view','TcCerticficateController@trans_certi_view');

});

Route::get('/student/{tution_fee}/tution/pdf', 'Fee\TutionFeeCollectionController@print_tution_pdf');
Route::get('/student/{transport_fee}/transport/pdf', 'Fee\TransportFeeCollectionController@print_transport_pdf');
Route::get('/student/{registration_fee}/registration/pdf', 'Fee\RegistraionFeeCollectionController@print_registration_pdf');
Route::get('/acadmic/{t}/t_c_print','TcCerticficateController@trans_certi_print');
Route::get('/acadmic/{c}/c_c_print','CharCerticficateController@chare_certi_print');

Route::get('/acadmic/{t}/download_t_c_print','TcCerticficateController@download_trans_certi_print');
Route::get('/acadmic/{c}/download_c_c_print','CharCerticficateController@download_chare_certi_print');

