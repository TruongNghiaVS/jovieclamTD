<?php

namespace App\Http\Controllers\Company;

use App\Helpers\DataArrayHelper;
use App\RecruiterSharedResume;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allResumes = RecruiterSharedResume::all()->orderBy('created_at', 'desc');
        return view(config('app.THEME_PATH').'.company.resume.index', compact('allResumes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $cvId = $request->input('cv_id');
        $genders = DataArrayHelper::langGendersArray();
        $maritalStatuses = DataArrayHelper::langMaritalStatusesArray();
        $nationalities = DataArrayHelper::langNationalitiesArray();
        $countries = DataArrayHelper::langCountriesArray();
        $states = DataArrayHelper::langStatesArray();
        $cities = DataArrayHelper::langCitiesArray();
        $majors = DataArrayHelper::langMajorSubjectsArray();
        $skills = DataArrayHelper::langJobSkillsArray();
        $experiences = DataArrayHelper::langJobExperiencesArray();
        $languages = DataArrayHelper::languagesArray();
        $languageLevels = DataArrayHelper::langLanguageLevelsArray();
        return view(config('app.THEME_PATH').'.company.resume.add_edit')
            ->with('cvId', $cvId)
            ->with('genders', $genders)
            ->with('maritalStatuses', $maritalStatuses)
            ->with('nationalities', $nationalities)
            ->with('countries', $countries)
            ->with('states', $states)
            ->with('cities', $cities)
            ->with('majors', $majors)
            ->with('skills', $skills)
            ->with('experiences', $experiences)
            ->with('languages', $languages)
            ->with('edit', false)
            ->with('languageLevels', $languageLevels);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->all();
        $resume = RecruiterSharedResume::create($params);
         /**
          * Add resume projects
          */
        if(isset($params['projects'])) {
            foreach ($params['projects'] as $project) {
                $resume->projects()->create($project);
            }
        }
        /**
         * Add resume educations
         */
        if(isset($params['educations'])) {
            foreach ($params['educations'] as $education) {
                $resume->educations()->create($education);
            }
        }
        /**
         * Add resume experiences
         */
        if(isset($params['experiences'])) {
            foreach ($params['experiences'] as $experience) {
                $resume->experiences()->create($experience);
            }
        }
        /**
         * Add resume languages
         */
        if(isset($params['languages'])) {
            foreach ($params['languages'] as $language) {
                $resume->languages()->create($language);
            }
        }
        /**
         * Add resume skills
         */
        if(isset($params['skills'])) {
            foreach ($params['skills'] as $skill) {
                $resume->skills()->create($skill);
            }
        }
        return redirect()->route('company.resume.index')->with('success', __('Resume created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RecruiterSharedResume  $resume
     * @return \Illuminate\Http\Response
     */
    public function show(RecruiterSharedResume $resume)
    {
       $link = $resume->path;
       $officeGG = "<iframe src=\"https://docs.google.com/gview?url=$link\" frameborder='0'></iframe>";
       return view(config('app.THEME_PATH').'.company.resume.show', compact('resume', 'officeGG'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RecruiterSharedResume $resume
     * @return \Illuminate\Http\Response
     */
    public function edit(RecruiterSharedResume $resume)
    {
        $genders = DataArrayHelper::langGendersArray();
        $maritalStatuses = DataArrayHelper::langMaritalStatusesArray();
        $nationalities = DataArrayHelper::langNationalitiesArray();
        $countries = DataArrayHelper::langCountriesArray();
        $states = DataArrayHelper::langStatesArray();
        $cities = DataArrayHelper::langCitiesArray();
        $majors = DataArrayHelper::langMajorSubjectsArray();
        $skills = DataArrayHelper::langJobSkillsArray();
        $experiences = DataArrayHelper::langJobExperiencesArray();
        $languages = DataArrayHelper::languagesArray();
        $languageLevels = DataArrayHelper::langLanguageLevelsArray();
        return view(config('app.THEME_PATH').'.company.resume.add_edit')
            ->with('genders', $genders)
            ->with('maritalStatuses', $maritalStatuses)
            ->with('nationalities', $nationalities)
            ->with('countries', $countries)
            ->with('states', $states)
            ->with('cities', $cities)
            ->with('majors', $majors)
            ->with('skills', $skills)
            ->with('experiences', $experiences)
            ->with('languages', $languages)
            ->with('edit', true)
            ->with('languageLevels', $languageLevels);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RecruiterSharedResume  $resume
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecruiterSharedResume $resume)
    {
        $params = $request->all();
        $resume->update($params);
        /**
         * Add resume projects
         */
        if(isset($params['projects'])) {
            foreach ($params['projects'] as $project) {
                $resume->projects()->update($project);
            }
        }
        /**
         * Add resume educations
         */
        if(isset($params['educations'])) {
            foreach ($params['educations'] as $education) {
                $resume->educations()->update($education);
            }
        }
        /**
         * Add resume experiences
         */
        if(isset($params['experiences'])) {
            foreach ($params['experiences'] as $experience) {
                $resume->experiences()->update($experience);
            }
        }
        /**
         * Add resume languages
         */
        if(isset($params['languages'])) {
            foreach ($params['languages'] as $language) {
                $resume->languages()->update($language);
            }
        }
        /**
         * Add resume skills
         */
        if(isset($params['skills'])) {
            foreach ($params['skills'] as $skill) {
                $resume->skills()->update($skill);
            }
        }
        return redirect()->route('company.resume.index')->with('success', __('Resume updated successfully'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RecruiterSharedResume  $resume
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecruiterSharedResume $resume)
    {
        $resume->delete();
        return redirect()->route('company.resume.index')->with('success', __('Resume deleted successfully'));
    }

    public function download(RecruiterSharedResume $resume)
    {
        $link = $resume->path;
        return response()->download($link);
    }

    public function writeToWord(RecruiterSharedResume $resume)
    {
        $link = $resume->path;
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $section->addText($link);
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save(storage_path('app/public/resume.docx'));
        return response()->download(storage_path('app/public/resume.docx'));
    }
}
