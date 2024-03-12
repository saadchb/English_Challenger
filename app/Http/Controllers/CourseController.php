<?php

namespace App\Http\Controllers;

use App\Http\Requests\courseRquest;
use App\Models\Categorie;
use App\Models\CategoriesCourse;
use App\Models\Course;
use App\Models\Faq;
use App\Models\KeyFeature;
use App\Models\Requirement;
use App\Models\Tag;
use App\Models\TagsCourse;
use App\Models\TargetAudience;
use Illuminate\Http\Request;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        $categories = Categorie::join('categories_courses', 'categories.id','=','categories_courses.categorie_id')->get();
        // dd($categories);
        return view('Backend_editor.courses.index',['courses' => $courses, 'categories' =>$categories]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Categorie::all();
        return view('Backend_editor.courses.create',['tags' => $tags, 'categories' => $categories]);
    }
    /**
     * Store a newly created resource in storage.
     */
        public function store(courseRquest $request)
        {
            $course = $request->all();
            $course['img'] = $request->file('img')->store('imagesCourses','public');
            !$request->input('blocked_content_by_duration')?$course['blocked_content_by_duration'] = '0' :'';
            !$request->input('blocked_content_by_student') ? $course['blocked_content_by_student'] = '0' :'';
            !$request->input('students_list') ? $course['students_list'] = '0':'';
            !$request->input('students_list') ? $course['students_list'] = '0':'';
            !$request->input('allow_repurchase') ? $course['allow_repurchase'] = '0':'';
            !$request->input('finish_button') ? $course['finish_button'] = '0':'';
            !$request->input('add_to_featured_list') ? $course['add_to_featured_list'] = '0':'';
            !$request->input('there_is_no_enrollment_requirement') ? $course['there_is_no_enrollment_requirement'] = '0':'';
            if($course['sale_start_dates']){
                $course['sale_start_dates'] = $request->input('sale_start_dates').' '.$request->input('sale_start_hours').':'.$request->input('sale_start_minutes').':00';
            }if($course['sale_end_dates']){
                $course['sale_end_dates'] = $request->input('sale_end_dates').' '.$request->input('sale_end_hours').':'.$request->input('sale_end_minutes').':00';
            }
            $course['sale_price']>$course['regular_price']? $course['sale_price'] = 0:'';
            $newCourse = Course::create($course);
            $id = $newCourse->id;
            $categories = $request->input('categories');
            if($categories){
                foreach($categories as $categorie){
                CategoriesCourse::create(array(
                    'course_id' =>$id,
                    'categorie_id' => $categorie
                ));
            }
            }
            $tags = $request->input('tags');
            if($tags){
                foreach($tags as $tag){
                TagsCourse::create(array(
                    'course_id' =>$id,
                    'tag_id' => $tag
                ));
            }
            }
            $data = $request->input('tableData');
            $datasJson = json_decode($data, true);
            $requ = $datasJson[0];
            $key = $datasJson[1];
            $traget = $datasJson[2];
            $faq = $datasJson[3];
            if($requ){
                foreach($requ as $re){
                    Requirement::create(array(
                        'title' => $re,
                        'course_id' => $id
                    ));
                }
            }
            if($key){
                foreach($key as $ke){
                    KeyFeature::create(array(
                        'title' => $ke,
                        'course_id' => $id
                    ));
                }
            }
            if($traget){
                foreach($traget as $tar){
                    TargetAudience::create(array(
                        'title' => $tar,
                        'course_id' => $id
                    ));
                }
            }
            // dd($faq);
            if($faq){
                foreach($faq as $fa){
                    Faq::create(array(
                        'label' => $fa['label'],
                        'content' => $fa['content'],
                        'course_id' => $id
                    ));
                }
            }
            // dd($dataJson);
            return redirect()->route('Courses.index');
        }
    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $course = Course::findOrFail($id);
        $categories = Categorie::join('categories_courses', 'categories.id','=','categories_courses.categorie_id')->where('course_id',$id)->get();
        $tags = Tag::join('tags_courses', 'tags.id','=','tags_courses.tag_id')->where('course_id',$id)->get();
        $requirements = Requirement::all()->where('course_id',$id);
        $targetsAudiences =TargetAudience::all()->where('course_id',$id);
        $keysFeatures = KeyFeature::all()->where('course_id',$id);
        $faqs = Faq::all()->where('course_id',$id);
        return view('Backend_editor.courses.edit',['tags' => $tags, 'categories' => $categories,'course'=>$course, 'requirements'=>$requirements,'targetsAudiences'=>$targetsAudiences,'keysFeatures'=>$keysFeatures,'faqs'=>$faqs]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(courseRquest $request, int $id)
    {
        $couresOld = Course::findOrFail($id);
        $course = $request->all();
            $course['img'] = $request->file('img')->store('imagesCourses','public');
            !$request->input('blocked_content_by_duration')?$course['blocked_content_by_duration'] = '0' :'';
            !$request->input('blocked_content_by_student') ? $course['blocked_content_by_student'] = '0' :'';
            !$request->input('students_list') ? $course['students_list'] = '0':'';
            !$request->input('students_list') ? $course['students_list'] = '0':'';
            !$request->input('allow_repurchase') ? $course['allow_repurchase'] = '0':'';
            !$request->input('finish_button') ? $course['finish_button'] = '0':'';
            !$request->input('add_to_featured_list') ? $course['add_to_featured_list'] = '0':'';
            !$request->input('there_is_no_enrollment_requirement') ? $course['there_is_no_enrollment_requirement'] = '0':'';
            if($course['sale_start_dates']){
                $course['sale_start_dates'] = $request->input('sale_start_dates').' '.$request->input('sale_start_hours').':'.$request->input('sale_start_minutes').':00';
            }if($course['sale_end_dates']){
                $course['sale_end_dates'] = $request->input('sale_end_dates').' '.$request->input('sale_end_hours').':'.$request->input('sale_end_minutes').':00';
            }
            $course['sale_price']>$course['regular_price']? $course['sale_price'] = 0:'';
            $couresOld->update($course);
            $categories = $request->input('categories');
            if($categories){
                CategoriesCourse::where('course_id',$id)->delete();
                foreach($categories as $categorie){
                CategoriesCourse::create(array(
                    'course_id' =>$id,
                    'categorie_id' => $categorie
                ));
            }
            }
            $tags = $request->input('tags');
            if($tags){
                TagsCourse::where('course_id',$id)->delete();
                foreach($tags as $tag){
                TagsCourse::create(array(
                    'course_id' =>$id,
                    'tag_id' => $tag
                ));
            }
            }
            $data = $request->input('tableData');
            $datasJson = json_decode($data, true);
            $requ = $datasJson[0];
            $key = $datasJson[1];
            $traget = $datasJson[2];
            $faq = $datasJson[3];
            if($requ){
                Requirement::where('course_id',$id)->delete();
                foreach($requ as $re){
                    Requirement::create(array(
                        'title' => $re,
                        'course_id' => $id
                    ));
                }
            }
            if($key){
                KeyFeature::where('course_id',$id)->delete();
                foreach($key as $ke){
                    KeyFeature::create(array(
                        'title' => $ke,
                        'course_id' => $id
                    ));
                }
            }
            if($traget){
                TargetAudience::where('course_id',$id)->delete();
                foreach($traget as $tar){
                    TargetAudience::create(array(
                        'title' => $tar,
                        'course_id' => $id
                    ));
                }
            }
            // dd($faq);
            if($faq){
                Faq::where('course_id',$id)->delete();
                foreach($faq as $fa){
                    Faq::create(array(
                        'label' => $fa['label'],
                        'content' => $fa['content'],
                        'course_id' => $id
                    ));
                }
            }
            // dd($dataJson);
            return redirect()->route('Courses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
