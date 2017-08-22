<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Asession;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // view()->composer(['analysis.form.yearform','search.results_student'],function($view){
        //   $view->with('yearoptions',\App\Student::yearname()->get());
        // });

         view()->composer(['search.results_student'],function($view){
          $view->with('asessions',\DB::table("asessions")->pluck("name","id"));
        });

        view()->composer(['analysis.form.courseform','search.results_student','students.search_students','students.create.student_profile','students.edit.update_student_profile','fee.transportation_form','fee.fee_form','add.tution_fee.tution_fee_structure','students.unpaid.tution_unpaid','students.unpaid.transport_unpaid','students.unpaid.registration_unpaid','income.income','income.income_trans','delete.delete_sub','delete.delete_tra','add.registraion_fee.registraion_fee_structure','transactions.tution.tution_transcations','transactions.transport.transport_transcations','transactions.registraion.registraion_transcations','deletetransactions.tution.delete_tution_transcations','deletetransactions.transport.delete_transport_transcations','deletetransactions.registration.delete_registration_transcations','students.attachment.course_section','search.stopage_wise_students_search'],function($view){
          $view->with('courses',\DB::table("courses")->pluck("name","id"));
        });

        view()->composer(['search.results_student','students.attachment.course_section'],function($view){
          $view->with('sections',\DB::table("sections")->pluck("name","id"));
        });

        view()->composer(['students.create.student_address','students.edit.update_student_address','teachers.create.teacher_address','teachers.edit.edit_teacher_address'],function($view){
          $view->with('cityies',\DB::table("cities")->pluck("name","id"));
        });

        view()->composer(['students.create.student_address','students.edit.update_student_address','teachers.create.teacher_address','teachers.edit.edit_teacher_address'],function($view){
          $view->with('state',\DB::table("states")->pluck("name","id"));
        });

        view()->composer(['students.create.student_profile','add.transport_fee.trans_fee_structure','students.edit.update_student_profile','teachers.create.teacher_profile','teachers.edit.edit_teacher_profile','search.stopage_wise_students_search','students.unpaid.transport_unpaid'],function($view){
          $view->with('stopages',\DB::table("stopages")->pluck("name","id"));
        });

        view()->composer(['students.unpaid.tution_unpaid','students.unpaid.transport_unpaid','students.unpaid.registration_unpaid','transactions.tution.tution_transcations','transactions.transport.transport_transcations','transactions.registraion.registraion_transcations','deletetransactions.tution.delete_tution_transcations','deletetransactions.transport.delete_transport_transcations','deletetransactions.registration.delete_registration_transcations','students.profile.student_profile'],function($view){
          $view->with('asession',Asession::where('active',1)
                                        ->select('id','name')
                                         ->first());
        });

        view()->composer(['students.create.student_profile','students.edit.update_student_profile','teachers.create.teacher_profile'],function($view){
          $view->with('asessions',\DB::table("asessions")->pluck("name","id"));
        });


         Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
