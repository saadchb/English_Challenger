<?php

namespace App\Http\Controllers;

use App\Http\Requests\courseRquest;
use App\Models\Categorie;
use App\Models\CategoriesCourse;
use App\Models\Course;
use App\Models\Curriculum;
use App\Models\Faq;
use App\Models\Homme;
use App\Models\KeyFeature;
use App\Models\Lesson;
use App\Models\Quiz;
use App\Models\Requirement;
use App\Models\review;
use App\Models\Tag;
use App\Models\TagsCourse;
use App\Models\TargetAudience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

use App\Traits\ShowOfCoures;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ShowOfCoures;
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');
        $courses = Course::paginate(8);
        foreach ($courses as $course) {
            $course->nblessonsbycourses = $course->nblessonsbycourse();
        }
        if ($searchTerm) {
            $courses = Course::when($searchTerm, function ($query) use ($searchTerm) {
                $query->where('title', 'like', '%' . $searchTerm . '%');
            })->get();
        }
        $categories = Categorie::join('categories_courses', 'categories.id', '=', 'categories_courses.categorie_id')->get();
        // dd($categories);
        return view('Backend_editor.courses.index', ['courses' => $courses, 'categories' => $categories]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Categorie::all();
        return view('Backend_editor.courses.create', ['tags' => $tags, 'categories' => $categories]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(courseRquest $request)
    {
        $course = $request->all();
        $course['img'] = $request->file('img')->store('imagesCourses', 'public');
        !$request->input('blocked_content_by_duration') ? $course['blocked_content_by_duration'] = '0' : '';
        !$request->input('blocked_content_by_student') ? $course['blocked_content_by_student'] = '0' : '';
        !$request->input('students_list') ? $course['students_list'] = '0' : '';
        !$request->input('students_list') ? $course['students_list'] = '0' : '';
        !$request->input('allow_repurchase') ? $course['allow_repurchase'] = '0' : '';
        !$request->input('finish_button') ? $course['finish_button'] = '0' : '';
        !$request->input('add_to_featured_list') ? $course['add_to_featured_list'] = '0' : '';
        !$request->input('there_is_no_enrollment_requirement') ? $course['there_is_no_enrollment_requirement'] = '0' : '';
        if ($course['sale_start_dates']) {
            $course['sale_start_dates'] = $request->input('sale_start_dates') . ' ' . $request->input('sale_start_hours') . ':' . $request->input('sale_start_minutes') . ':00';
        }
        if ($course['sale_end_dates']) {
            $course['sale_end_dates'] = $request->input('sale_end_dates') . ' ' . $request->input('sale_end_hours') . ':' . $request->input('sale_end_minutes') . ':00';
        }
        $course['sale_price'] > $course['regular_price'] ? $course['sale_price'] = 0 : '';
        $newCourse = Course::create($course);
        $id = $newCourse->id;
        $categories = $request->input('categories');
        if ($categories) {
            foreach ($categories as $categorie) {
                CategoriesCourse::create(array(
                    'course_id' => $id,
                    'categorie_id' => $categorie
                ));
            }
        }
        $tags = $request->input('tags');
        if ($tags) {
            foreach ($tags as $tag) {
                TagsCourse::create(array(
                    'course_id' => $id,
                    'tag_id' => $tag
                ));
            }
        }


        $requ = null;
        $key = null;
        $faq = null;
        $target = null; // Corrected variable name

        $data = $request->input('tableData');
        $datasJson = json_decode($data, true);

        if (isset($datasJson[0])) {
            $requ = $datasJson[0];
            // Your code for Requirement
        }

        if (isset($datasJson[1])) {
            $key = $datasJson[1];
            // Your code for KeyFeature
        }

        if (isset($datasJson[2])) {
            $target = $datasJson[2];
            // Your code for TargetAudience
        }

        if (isset($datasJson[3])) {
            $faq = $datasJson[3];
            // Your code for Faq
        }

        if ($requ) {
            Requirement::where('course_id', $id)->delete();
            foreach ($requ as $re) {
                Requirement::create(array(
                    'title' => $re,
                    'course_id' => $id
                ));
            }
        }

        if ($key) {
            KeyFeature::where('course_id', $id)->delete();
            foreach ($key as $ke) {
                KeyFeature::create(array(
                    'title' => $ke,
                    'course_id' => $id
                ));
            }
        }

        if ($target) { // Corrected variable name
            TargetAudience::where('course_id', $id)->delete();
            foreach ($target as $tar) { // Corrected variable name
                TargetAudience::create(array(
                    'title' => $tar,
                    'course_id' => $id
                ));
            }
        }

        if ($faq) {
            Faq::where('course_id', $id)->delete();
            foreach ($faq as $fa) {
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
    public function show(int $id)
    {
        $courseData = $this->ShowOfCoures($id);  // this utilises the trait of laravel (mohamed)
        return view('Backend_editor.courses.show', $courseData);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $curricula = Curriculum::where('course_id', $id)->get();
        $quizzes = Quiz::orderBy('order', 'asc')->get()->toArray();
        $lessons = Lesson::orderBy('order', 'asc')->get()->toArray();
        foreach ($quizzes as $quiz) {
            $lessons[] = $quiz;
        }
        usort($lessons, function ($a, $b) {
            return $a['order'] <=> $b['order'];
        });
        $tags = Tag::all();
        $categories = Categorie::all();
        $course = Course::findOrFail($id);
        $tags_Course = TagsCourse::all();
        $categories_course = CategoriesCourse::all();
        $requirements = Requirement::all()->where('course_id', $id);
        $targetsAudiences = TargetAudience::all()->where('course_id', $id);
        $keysFeatures = KeyFeature::all()->where('course_id', $id);
        $faqs = Faq::all()->where('course_id', $id);
        return view('Backend_editor.courses.edit', [
            'tags' => $tags, 'categories' => $categories,
            'course' => $course, 'requirements' => $requirements, 'targetsAudiences' => $targetsAudiences,
            'keysFeatures' => $keysFeatures, 'faqs' => $faqs, 'categories_course' => $categories_course,
            'tags_course' => $tags_Course, 'curricula' => $curricula, 'quizzes' => $quizzes, 'lessons' => $lessons
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(courseRquest $request, int $id)
    {
        $couresOld = Course::findOrFail($id);
        $course = $request->all();
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('imagesCourses', 'public');
            $course['img'] = $imagePath;
        }
        !$request->input('blocked_content_by_duration') ? $course['blocked_content_by_duration'] = '0' : '';
        !$request->input('blocked_content_by_student') ? $course['blocked_content_by_student'] = '0' : '';
        !$request->input('students_list') ? $course['students_list'] = '0' : '';
        !$request->input('students_list') ? $course['students_list'] = '0' : '';
        !$request->input('allow_repurchase') ? $course['allow_repurchase'] = '0' : '';
        !$request->input('finish_button') ? $course['finish_button'] = '0' : '';
        !$request->input('add_to_featured_list') ? $course['add_to_featured_list'] = '0' : '';
        !$request->input('there_is_no_enrollment_requirement') ? $course['there_is_no_enrollment_requirement'] = '0' : '';
        if ($course['sale_start_dates']) {
            $course['sale_start_dates'] = $request->input('sale_start_dates') . ' ' . $request->input('sale_start_hours') . ':' . $request->input('sale_start_minutes') . ':00';
        }
        if ($course['sale_end_dates']) {
            $course['sale_end_dates'] = $request->input('sale_end_dates') . ' ' . $request->input('sale_end_hours') . ':' . $request->input('sale_end_minutes') . ':00';
        }
        $course['sale_price'] > $course['regular_price'] ? $course['sale_price'] = 0 : '';
        $couresOld->update($course);
        $categories = $request->input('categories');
        if ($categories) {
            CategoriesCourse::where('course_id', $id)->delete();
            foreach ($categories as $categorie) {
                CategoriesCourse::create(array(
                    'course_id' => $id,
                    'categorie_id' => $categorie
                ));
            }
        }
        $tags = $request->input('tags');
        if ($tags) {
            TagsCourse::where('course_id', $id)->delete();
            foreach ($tags as $tag) {
                TagsCourse::create(array(
                    'course_id' => $id,
                    'tag_id' => $tag
                ));
            }
        }
        $requ = null;
        $key = null;
        $faq = null;
        $target = null; // Corrected variable name

        $data = $request->input('tableData');
        $datasJson = json_decode($data, true);

        if (isset($datasJson[0])) {
            $requ = $datasJson[0];
            // Your code for Requirement
        }

        if (isset($datasJson[1])) {
            $key = $datasJson[1];
            // Your code for KeyFeature
        }

        if (isset($datasJson[2])) {
            $target = $datasJson[2];
            // Your code for TargetAudience
        }

        if (isset($datasJson[3])) {
            $faq = $datasJson[3];
            // Your code for Faq
        }

        if ($requ) {
            Requirement::where('course_id', $id)->delete();
            foreach ($requ as $re) {
                Requirement::create(array(
                    'title' => $re,
                    'course_id' => $id
                ));
            }
        }

        if ($key) {
            KeyFeature::where('course_id', $id)->delete();
            foreach ($key as $ke) {
                KeyFeature::create(array(
                    'title' => $ke,
                    'course_id' => $id
                ));
            }
        }

        if ($target) { // Corrected variable name
            TargetAudience::where('course_id', $id)->delete();
            foreach ($target as $tar) { // Corrected variable name
                TargetAudience::create(array(
                    'title' => $tar,
                    'course_id' => $id
                ));
            }
        }

        if ($faq) {
            Faq::where('course_id', $id)->delete();
            foreach ($faq as $fa) {
                Faq::create(array(
                    'label' => $fa['label'],
                    'content' => $fa['content'],
                    'course_id' => $id
                ));
            }
        }

        $dataLQ = session('dataLQ');
        $dataLQ2 = [];
        foreach ($dataLQ as $key => $data) {
            $data['order'] = $key + 1;
            array_push($dataLQ2, $data);
        }
        foreach ($dataLQ2 as $data) {
            if ($data['type'] == 'quiz') {
                $quizOrdered = Quiz::findOrFail($data['id']);
                $quizOrdered->update(['order' => $data['order']]);
            } else {
                $lessonOrdered = Lesson::findOrFail($data['id']);
                $lessonOrdered->update(['order' => $data['order']]);
            }
        }
        session()->flush();
        return redirect()->route('Courses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('Courses.index');
    }
    public function indexEn()
    {
        $categorieByCourses = Categorie::select('categories.title', DB::raw('count(*) as nbCoursesByCategorie'))
            ->join('categories_courses', 'categories_courses.categorie_id', '=', 'categories.id')
            ->groupBy('categories.title')
            ->orderByDesc('nbCoursesByCategorie')
            ->limit(12)
            ->get();
        $nbCourses = Course::nbcourses();
        $courses = Course::limit(6)->get();
        $categories_course = CategoriesCourse::all();
        foreach ($courses as $course) {
            $reviews = review::where('course_id', $course->id)->get();
            if ($reviews->isEmpty()) {
                $course->rating = 0;
            } else {
                $totalRating = 0;
                foreach ($reviews as $review) {
                    $totalRating += $review->rating;
                }
                $course->rating = $totalRating / $reviews->count();
            }
            $nbstudents = DB::table('details_students')
            ->where('course_id', $course->id)
            ->select('student_id')
            ->distinct()
            ->count();
            $course->fake_students_enrolled += $nbstudents;
            if(empty($course->fake_students_enrolled)) {
                $course->fake_students_enrolled = 0;
            }
            $course->nblessonsbycourses = $course->nblessonsbycourse();
        }

        $tags = Tag::all();
        $categories = Categorie::all();

        $featuredVideo = Homme::where('is_active', true)->latest()->first();
        $latestFeaturedId = Homme::where('is_active', true)->latest()->value('id');
        $normalVideos = Homme::where('id', '<>', $latestFeaturedId)->latest()->paginate(3);

        return view('EnglishChallenger.index', [
            'featuredVideo'=> $featuredVideo,
            'normalVideos'=> $normalVideos,
            'courses' => $courses, 'tags' => $tags,
            'categories' => $categories, 'nbCourses' => $nbCourses,
            'categories_course' => $categories_course,
            'categorieByCourses' => $categorieByCourses
        ]);
    }
    public function show2(int $id)
    {
        $courseData = $this->ShowOfCoures($id);
        return view('EnglishChallenger.course_detail', $courseData);
    }
    public function indexCr()
    {
        $courses = Course::paginate(6);
        foreach ($courses as $course) {
            $reviews = review::where('course_id', $course->id)->get();
            if ($reviews->isEmpty()) {
                $course->rating = 0;
            } else {
                $totalRating = 0;
                foreach ($reviews as $review) {
                    $totalRating += $review->rating;
                }
                $course->rating = $totalRating / $reviews->count();
            }
            $nbstudents = DB::table('details_students')
            ->where('course_id', $course->id)
            ->select('student_id')
            ->distinct()
            ->count();
            $course->fake_students_enrolled += $nbstudents;
            $course->nblessonsbycourses = $course->nblessonsbycourse();
        }
        return view('EnglishChallenger.course_list', ['courses' => $courses]);
    }
}
