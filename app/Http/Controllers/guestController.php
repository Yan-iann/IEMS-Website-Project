<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Wildlife;
use App\Models\thesis_paper;
use App\Models\journal_article;
use Illuminate\Support\Facades\DB;

class guestController extends Controller
{
    public function guestDashboard()
    {
        $searchClass = DB::table('wildlife')
            ->select('wildlife.wildlife_class')
            ->distinct('wildlife.wildlife_class')
            ->where('wildlife_type', 'Zoo')
            ->get();

        $searchSpecie = DB::table('wildlife')
            ->select('wildlife.wildlife_species')
            ->distinct('wildlife.wildlife_species')
            ->where('wildlife_type', 'Zoo')
            ->get();

        $searchLoc = DB::table('wildlife')
            ->select('wildlife.wildlife_location')
            ->distinct('wildlife.wildlife_location')
            ->where('wildlife_type', 'Zoo')
            ->get();

        $guestDashboard = Wildlife::where('wildlife_type', 'Zoo')->get();
        return view('IEMS.Linus.GUEST.GuestWLDashboard')
            ->with('studentDashboard', $guestDashboard)
            ->with('searchClass', $searchClass)
            ->with('searchSpecie', $searchSpecie)
            ->with('searchLoc', $searchLoc);
    } //end viewing of GUEST wildlife dashboard

    public function thesis()
    {
        $searchRef = DB::table('thesis_paper')
            ->select('thesis_paper.thesis_reference')
            ->distinct('thesis_paper.thesis_reference')
            ->get();

        $searchAuthor = DB::table('thesis_paper')
            ->select('thesis_paper.thesis_author')
            ->distinct('thesis_paper.thesis_author')
            ->get();

        $thesis = thesis_paper::all();
        return view('IEMS.Linus.GUEST.GuestThesisDashboard')
            ->with('thesis', $thesis)
            ->with('searchRef', $searchRef)
            ->with('searchAuthor', $searchAuthor);
    }
    public function gradThesis()
    {
        $searchRef = DB::table('thesis_paper')
            ->select('thesis_paper.thesis_reference')
            ->distinct('thesis_paper.thesis_reference')
            ->get();

        $searchAuthor = DB::table('thesis_paper')
            ->select('thesis_paper.thesis_author')
            ->distinct('thesis_paper.thesis_author')
            ->get();

        $thesis = thesis_paper::where('thesis_type', 'Graduate')->get();
        return view('IEMS.Linus.GUEST.GuestThesisDashboard')
            ->with('thesis', $thesis)
            ->with('searchRef', $searchRef)
            ->with('searchAuthor', $searchAuthor);
    }
    public function undergradThesis()
    {
        $searchRef = DB::table('thesis_paper')
            ->select('thesis_paper.thesis_reference')
            ->distinct('thesis_paper.thesis_reference')
            ->get();

        $searchAuthor = DB::table('thesis_paper')
            ->select('thesis_paper.thesis_author')
            ->distinct('thesis_paper.thesis_author')
            ->get();

        $thesis = thesis_paper::where('thesis_type', 'UnderGraduate')->get();
        return view('IEMS.Linus.GUEST.GuestThesisDashboard')
            ->with('thesis', $thesis)
            ->with('searchRef', $searchRef)
            ->with('searchAuthor', $searchAuthor);
    }

    public function journal()
    {
        $searchRef = DB::table('journal_article')
            ->select('journal_article.journal_reference')
            ->distinct('journal_article.journal_reference')
            ->get();

        $searchDate = DB::table('journal_article')
            ->select('journal_article.date_published')
            ->distinct('journal_article.date_published')
            ->get();


        $journal = journal_article::all();
        return view('IEMS.Linus.GUEST.GuestJournalDashboard')
            ->with('journal', $journal)
            ->with('searchDate', $searchDate)
            ->with('searchRef', $searchRef);
    }

    public function boneCollection()
    {
        $searchGenus = DB::table('wildlife')
            ->select('wildlife.wildlife_genus')
            ->distinct('wildlife.wildlife_genus')
            ->where('wildlife_type', 'Bone')
            ->get();

        $searchDate = DB::table('wildlife')
            ->select('wildlife.date_added')
            ->distinct('wildlife.date_added')
            ->where('wildlife_type', 'Bone')
            ->get();

        $wildlife = Wildlife::where('wildlife_type', 'Bone')->get();
        return view('IEMS.Linus.GUEST.GuestBoneCollection')
            ->with('wildlifes', $wildlife)
            ->with('searchGenus', $searchGenus)
            ->with('searchDate', $searchDate);
    }
    public function refCollection()
    {
        $searchGenus = DB::table('wildlife')
            ->select('wildlife.wildlife_genus')
            ->distinct('wildlife.wildlife_genus')
            ->where('wildlife_type', 'Reference')
            ->get();

        $searchDate = DB::table('wildlife')
            ->select('wildlife.date_added')
            ->distinct('wildlife.date_added')
            ->where('wildlife_type', 'Reference')
            ->get();

        $wildlife = Wildlife::where('wildlife_type', 'Reference')->get();
        return view('IEMS.Linus.GUEST.GuestRefCollection')
            ->with('wildlifes', $wildlife)
            ->with('searchGenus', $searchGenus)
            ->with('searchDate', $searchDate);
    }
    public function searchwildlife(Request $request)
    {
        $searchClass = DB::table('wildlife')
            ->select('wildlife.wildlife_class')
            ->distinct('wildlife.wildlife_class')
            ->where('wildlife_type', 'Zoo')
            ->get();

        $searchSpecie = DB::table('wildlife')
            ->select('wildlife.wildlife_species')
            ->distinct('wildlife.wildlife_species')
            ->where('wildlife_type', 'Zoo')
            ->get();

        $searchLoc = DB::table('wildlife')
            ->select('wildlife.wildlife_location')
            ->distinct('wildlife.wildlife_location')
            ->where('wildlife_type', 'Zoo')
            ->get();

        $wildlife = Wildlife::where('wildlife_type', 'Zoo')->get();
        //for class
        if ($request->wildlife_class) {
            $wildlife = Wildlife::where('wildlife_class', 'LIKE', '%' . $request->wildlife_class . '%')
                ->where('wildlife_type', 'Zoo')
                ->get();
        }
        //for species
        if ($request->wildlife_species) {
            $wildlife = Wildlife::where('wildlife_species', 'LIKE', '%' . $request->wildlife_species . '%')
                ->where('wildlife_type', 'Zoo')
                ->get();
        }
        //for location
        if ($request->wildlife_location) {
            $wildlife = Wildlife::where('wildlife_location', 'LIKE', '%' . $request->wildlife_location . '%')
                ->where('wildlife_type', 'Zoo')
                ->get();
        }
        //for species and loc
        if ($request->wildlife_species && $request->wildlife_location) {
            $wildlife = Wildlife::where('wildlife_species', 'LIKE', '%' . $request->wildlife_species . '%')
                ->where('wildlife_location', 'LIKE', '%' . $request->wildlife_location . '%')
                ->where('wildlife_type', 'Zoo')
                ->get();
        }
        //for class and specie and loc
        if ($request->wildlife_class && $request->wildlife_species && $request->wildlife_location) {
            $wildlife = Wildlife::where('wildlife_class', 'LIKE', '%' . $request->wildlife_class . '%')
                ->where('wildlife_species', 'LIKE', '%' . $request->wildlife_species . '%')
                ->where('wildlife_location', 'LIKE', '%' . $request->wildlife_location . '%')
                ->where('wildlife_type', 'Zoo')
                ->get();
        }
        if ($request->searchWildlife) {
            $wildlife = Wildlife::where('wildlife_name', 'LIKE', '%' . $request->searchWildlife . '%')
                ->where('wildlife_type', 'Zoo')
                ->get();
        }
        return view('IEMS.Linus.GUEST.searchWildlife')
            ->with('wildlife', $wildlife)
            ->with('searchClass', $searchClass)
            ->with('searchSpecie', $searchSpecie)
            ->with('searchLoc', $searchLoc);
    }

    public function advanceSearchWildlife(Request $request)
    {

        $searchClass = DB::table('wildlife')
            ->select('wildlife.wildlife_class')
            ->distinct('wildlife.wildlife_class')
            ->where('wildlife_type', 'Zoo')
            ->get();

        $searchSpecie = DB::table('wildlife')
            ->select('wildlife.wildlife_species')
            ->distinct('wildlife.wildlife_species')
            ->where('wildlife_type', 'Zoo')
            ->get();

        $searchLoc = DB::table('wildlife')
            ->select('wildlife.wildlife_location')
            ->distinct('wildlife.wildlife_location')
            ->where('wildlife_type', 'Zoo')
            ->get();

        $wildlife = Wildlife::where('wildlife_type', 'Zoo')->get();
        //for search

        //for class
        if ($request->wildlife_class) {
            $wildlife = Wildlife::where('wildlife_class', 'LIKE', '%' . $request->wildlife_class . '%')
                ->where('wildlife_type', 'Zoo')
                ->get();
        }
        //for species
        if ($request->wildlife_species) {
            $wildlife = Wildlife::where('wildlife_species', 'LIKE', '%' . $request->wildlife_species . '%')
                ->where('wildlife_type', 'Zoo')
                ->get();
        }
        //for location
        if ($request->wildlife_location) {
            $wildlife = Wildlife::where('wildlife_location', 'LIKE', '%' . $request->wildlife_location . '%')
                ->where('wildlife_type', 'Zoo')
                ->get();
        }
        //for species and loc
        if ($request->wildlife_species && $request->wildlife_location) {
            $wildlife = Wildlife::where('wildlife_species', 'LIKE', '%' . $request->wildlife_species . '%')
                ->where('wildlife_location', 'LIKE', '%' . $request->wildlife_location . '%')
                ->where('wildlife_type', 'Zoo')
                ->get();
        }
        //for class and specie and loc
        if ($request->wildlife_class && $request->wildlife_species && $request->wildlife_location) {
            $wildlife = Wildlife::where('wildlife_class', 'LIKE', '%' . $request->wildlife_class . '%')
                ->where('wildlife_species', 'LIKE', '%' . $request->wildlife_species . '%')
                ->where('wildlife_location', 'LIKE', '%' . $request->wildlife_location . '%')
                ->where('wildlife_type', 'Zoo')
                ->get();
        }

        return view('IEMS.Linus.GUEST.searchWildlife')
            ->with('wildlife', $wildlife)
            ->with('searchClass', $searchClass)
            ->with('searchSpecie', $searchSpecie)
            ->with('searchLoc', $searchLoc);
    }

    //for thesis
    public function searchThesis(Request $request)
    {
        $searchRef = DB::table('thesis_paper')
            ->select('thesis_paper.thesis_reference')
            ->distinct('thesis_paper.thesis_reference')
            ->get();

        $searchAuthor = DB::table('thesis_paper')
            ->select('thesis_paper.thesis_author')
            ->distinct('thesis_paper.thesis_author')
            ->get();

        $thesis = thesis_paper::all();
        if ($request->thesis_author) {
            $thesis = thesis_paper::where('thesis_author', 'LIKE', '%' . $request->thesis_author . '%')->get();
        }
        if ($request->thesis_reference) {
            $thesis = thesis_paper::where('thesis_reference', 'LIKE', '%' . $request->thesis_reference . '%')->get();
        }
        if ($request->thesis_author && $request->thesis_reference) {
            $thesis = thesis_paper::where('thesis_author', 'LIKE', '%' . $request->thesis_author . '%')
                ->where('thesis_reference', 'LIKE', '%' . $request->thesis_reference . '%')
                ->get();
        }
        if ($request->searchThesis) {
            $thesis = thesis_paper::where('thesis_title', 'LIKE', '%' . $request->searchThesis . '%')
                ->get();
        }

        return view('IEMS.Linus.GUEST.searchThesis')
            ->with('thesis', $thesis)
            ->with('searchRef', $searchRef)
            ->with('searchAuthor', $searchAuthor);
    }
    public function advanceSearchThesis(Request $request)
    {
        $searchRef = DB::table('thesis_paper')
            ->select('thesis_paper.thesis_reference')
            ->distinct('thesis_paper.thesis_reference')
            ->get();

        $searchAuthor = DB::table('thesis_paper')
            ->select('thesis_paper.thesis_author')
            ->distinct('thesis_paper.thesis_author')
            ->get();

        $thesis = thesis_paper::all();
        if ($request->thesis_author) {
            $thesis = thesis_paper::where('thesis_author', 'LIKE', '%' . $request->thesis_author . '%')->get();
        }
        if ($request->thesis_reference) {
            $thesis = thesis_paper::where('thesis_reference', 'LIKE', '%' . $request->thesis_reference . '%')->get();
        }
        if ($request->thesis_author && $request->thesis_reference) {
            $thesis = thesis_paper::where('thesis_author', 'LIKE', '%' . $request->thesis_author . '%')
                ->where('thesis_reference', 'LIKE', '%' . $request->thesis_reference . '%')
                ->get();
        }
        return view('IEMS.Linus.GUEST.searchThesis')
            ->with('thesis', $thesis)
            ->with('searchRef', $searchRef)
            ->with('searchAuthor', $searchAuthor);
    }
    public function searchJournal(Request $request)
    {
        $searchRef = DB::table('journal_article')
            ->select('journal_article.journal_reference')
            ->distinct('journal_article.journal_reference')
            ->get();

        $searchDate = DB::table('journal_article')
            ->select('journal_article.date_published')
            ->distinct('journal_article.date_published')
            ->get();

        $journal = journal_article::all();
        if ($request->journal_reference) {
            $journal = journal_article::where('journal_reference', 'LIKE', '%' . $request->journal_reference . '%')
                ->get();
        }
        if ($request->date_published) {
            $journal = journal_article::where('date_published', 'LIKE', '%' . $request->date_published . '%')
                ->get();
        }
        if ($request->journal_reference && $request->date_published) {
            $journal = journal_article::where('journal_reference', 'LIKE', '%' . $request->journal_reference . '%')
                ->where('date_published', 'LIKE', '%' . $request->date_published . '%')
                ->get();
        }
        if ($request->searchJournal) {
            $journal = journal_article::where('journal_title', 'LIKE', '%' . $request->searchJournal . '%')->get();
        }
        return view('IEMS.Linus.GUEST.searchJournal')
            ->with('journal', $journal)
            ->with('searchRef', $searchRef)
            ->with('searchDate', $searchDate);
    }

    public function advanceSearchJournal(Request $request)
    {
        $searchRef = DB::table('journal_article')
            ->select('journal_article.journal_reference')
            ->distinct('journal_article.journal_reference')
            ->get();

        $searchDate = DB::table('journal_article')
            ->select('journal_article.date_published')
            ->distinct('journal_article.date_published')
            ->get();

        $journal = journal_article::all();

        if ($request->journal_reference) {
            $journal = journal_article::where('journal_reference', 'LIKE', '%' . $request->journal_reference . '%')
                ->get();
        }
        if ($request->date_published) {
            $journal = journal_article::where('date_published', 'LIKE', '%' . $request->date_published . '%')
                ->get();
        }
        if ($request->journal_reference && $request->date_published) {
            $journal = journal_article::where('journal_reference', 'LIKE', '%' . $request->journal_reference . '%')
                ->where('date_published', 'LIKE', '%' . $request->date_published . '%')
                ->get();
        }
        return view('IEMS.Linus.GUEST.searchJournal')
            ->with('journal', $journal)
            ->with('searchRef', $searchRef)
            ->with('searchDate', $searchDate);
    }

    public function searchBone(Request $request)
    {
        $searchGenus = DB::table('wildlife')
            ->select('wildlife.wildlife_genus')
            ->distinct('wildlife.wildlife_genus')
            ->where('wildlife_type', 'Bone')
            ->get();

        $searchDate = DB::table('wildlife')
            ->select('wildlife.date_added')
            ->distinct('wildlife.date_added')
            ->where('wildlife_type', 'Bone')
            ->get();
        $wildlife = Wildlife::where('wildlife_type', 'Bone')->get();
        //for genus
        if ($request->wildlife_genus) {
            $wildlife = Wildlife::where('wildlife_genus', 'LIKE', '%' . $request->wildlife_genus . '%')
                ->where('wildlife_type', 'Bone')
                ->get();
        }
        //for date
        if ($request->date_added) {
            $wildlife = Wildlife::where('date_added', 'LIKE', '%' . $request->date_added . '%')
                ->where('wildlife_type', 'Bone')
                ->get();
        }

        //for genus and date
        if ($request->wildlife_species && $request->date_added) {
            $wildlife = Wildlife::where('wildlife_genus', 'LIKE', '%' . $request->wildlife_genus . '%')
                ->where('date_added', 'LIKE', '%' . $request->date_added . '%')
                ->where('wildlife_type', 'Bone')
                ->get();
        }

        if ($request->searchBone) {
            $wildlife = Wildlife::where('wildlife_name', 'LIKE', '%' . $request->searchBone . '%')
                ->where('wildlife_type', 'Bone')
                ->get();
        }
        return view('IEMS.Linus.GUEST.searchBoneCollection')
            ->with('wildlifes', $wildlife)
            ->with('searchGenus', $searchGenus)
            ->with('searchDate', $searchDate);
    }

    public function advanceSearchBone(Request $request)
    {

        $searchGenus = DB::table('wildlife')
            ->select('wildlife.wildlife_genus')
            ->distinct('wildlife.wildlife_genus')
            ->where('wildlife_type', 'Bone')
            ->get();

        $searchDate = DB::table('wildlife')
            ->select('wildlife.date_added')
            ->distinct('wildlife.date_added')
            ->where('wildlife_type', 'Bone')
            ->get();

        //for genus
        if ($request->wildlife_genus) {
            $wildlife = Wildlife::where('wildlife_genus', 'LIKE', '%' . $request->wildlife_genus . '%')
                ->where('wildlife_type', 'Bone')
                ->get();
        }
        //for date
        if ($request->date_added) {
            $wildlife = Wildlife::where('date_added', 'LIKE', '%' . $request->date_added . '%')
                ->where('wildlife_type', 'Bone')
                ->get();
        }

        //for genus and date
        if ($request->wildlife_species && $request->date_added) {
            $wildlife = Wildlife::where('wildlife_genus', 'LIKE', '%' . $request->wildlife_genus . '%')
                ->where('date_added', 'LIKE', '%' . $request->date_added . '%')
                ->where('wildlife_type', 'Bone')
                ->get();
        }

        if ($request->searchBone) {
            $wildlife = Wildlife::where('wildlife_name', 'LIKE', '%' . $request->searchBone . '%')
                ->where('wildlife_type', 'Bone')
                ->get();
        }
        return view('IEMS.Linus.GUEST.searchBoneCollection')
            ->with('wildlifes', $wildlife)
            ->with('searchGenus', $searchGenus)
            ->with('searchDate', $searchDate);
    }
    public function searchRef(Request $request)
    {
        $searchGenus = DB::table('wildlife')
            ->select('wildlife.wildlife_genus')
            ->distinct('wildlife.wildlife_genus')
            ->where('wildlife_type', 'Reference')
            ->get();

        $searchDate = DB::table('wildlife')
            ->select('wildlife.date_added')
            ->distinct('wildlife.date_added')
            ->where('wildlife_type', 'Reference')
            ->get();
        $wildlife = Wildlife::where('wildlife_type', 'Reference')->get();
        //for genus
        if ($request->wildlife_genus) {
            $wildlife = Wildlife::where('wildlife_genus', 'LIKE', '%' . $request->wildlife_genus . '%')
                ->where('wildlife_type', 'Reference')
                ->get();
        }
        //for date
        if ($request->date_added) {
            $wildlife = Wildlife::where('date_added', 'LIKE', '%' . $request->date_added . '%')
                ->where('wildlife_type', 'Reference')
                ->get();
        }

        //for genus and date
        if ($request->wildlife_species && $request->date_added) {
            $wildlife = Wildlife::where('wildlife_genus', 'LIKE', '%' . $request->wildlife_genus . '%')
                ->where('date_added', 'LIKE', '%' . $request->date_added . '%')
                ->where('wildlife_type', 'Reference')
                ->get();
        }

        if ($request->searchRef) {
            $wildlife = Wildlife::where('wildlife_name', 'LIKE', '%' . $request->searchRef . '%')
                ->where('wildlife_type', 'Reference')
                ->get();
        }
        return view('IEMS.Linus.GUEST.searchRefCollection')
            ->with('wildlifes', $wildlife)
            ->with('searchGenus', $searchGenus)
            ->with('searchDate', $searchDate);
    }

    public function advanceSearchRef(Request $request)
    {

        $searchGenus = DB::table('wildlife')
            ->select('wildlife.wildlife_genus')
            ->distinct('wildlife.wildlife_genus')
            ->where('wildlife_type', 'Reference')
            ->get();

        $searchDate = DB::table('wildlife')
            ->select('wildlife.date_added')
            ->distinct('wildlife.date_added')
            ->where('wildlife_type', 'Reference')
            ->get();

        //for genus
        if ($request->wildlife_genus) {
            $wildlife = Wildlife::where('wildlife_genus', 'LIKE', '%' . $request->wildlife_genus . '%')
                ->where('wildlife_type', 'Reference')
                ->get();
        }
        //for date
        if ($request->date_added) {
            $wildlife = Wildlife::where('date_added', 'LIKE', '%' . $request->date_added . '%')
                ->where('wildlife_type', 'Reference')
                ->get();
        }

        //for genus and date
        if ($request->wildlife_species && $request->date_added) {
            $wildlife = Wildlife::where('wildlife_genus', 'LIKE', '%' . $request->wildlife_genus . '%')
                ->where('date_added', 'LIKE', '%' . $request->date_added . '%')
                ->where('wildlife_type', 'Reference')
                ->get();
        }

        return view('IEMS.Linus.GUEST.searchRefCollection')
            ->with('wildlifes', $wildlife)
            ->with('searchGenus', $searchGenus)
            ->with('searchDate', $searchDate);
    }

    public function sortNameDesc()
    {

        $searchClass = DB::table('wildlife')
            ->select('wildlife.wildlife_class')
            ->distinct('wildlife.wildlife_class')
            ->where('wildlife_type', 'Zoo')
            ->get();

        $searchSpecie = DB::table('wildlife')
            ->select('wildlife.wildlife_species')
            ->distinct('wildlife.wildlife_species')
            ->where('wildlife_type', 'Zoo')
            ->get();

        $searchLoc = DB::table('wildlife')
            ->select('wildlife.wildlife_location')
            ->distinct('wildlife.wildlife_location')
            ->where('wildlife_type', 'Zoo')
            ->get();

        $wildlife = Wildlife::where('wildlife_type', 'Zoo')
            ->orderBy('wildlife_name', 'DESC')
            ->get();
        return view('IEMS.Linus.GUEST.GuestWLDashboard')
            ->with('studentDashboard', $wildlife)
            ->with('searchClass', $searchClass)
            ->with('searchSpecie', $searchSpecie)
            ->with('searchLoc', $searchLoc);
    }
    public function sortNameDescB_G()
    {

        $searchGenus = DB::table('wildlife')
            ->select('wildlife.wildlife_genus')
            ->distinct('wildlife.wildlife_genus')
            ->where('wildlife_type', 'Bone')
            ->get();

        $searchDate = DB::table('wildlife')
            ->select('wildlife.date_added')
            ->distinct('wildlife.date_added')
            ->where('wildlife_type', 'Bone')
            ->get();

        $wildlife = Wildlife::where('wildlife_type', 'Bone')
            ->orderBy('wildlife_name', 'DESC')
            ->get();

        return view('IEMS.Linus.GUEST.GuestBoneCollection')
            ->with('wildlifes', $wildlife)
            ->with('searchGenus', $searchGenus)
            ->with('searchDate', $searchDate);
    }
    public function sortNameDescR_G()
    {

        $searchGenus = DB::table('wildlife')
            ->select('wildlife.wildlife_genus')
            ->distinct('wildlife.wildlife_genus')
            ->where('wildlife_type', 'Reference')
            ->get();

        $searchDate = DB::table('wildlife')
            ->select('wildlife.date_added')
            ->distinct('wildlife.date_added')
            ->where('wildlife_type', 'Reference')
            ->get();


        $wildlife = Wildlife::where('wildlife_type', 'Reference')
            ->orderBy('wildlife_name', 'DESC')
            ->get();

        return view('IEMS.Linus.GUEST.GuestRefCollection')
            ->with('wildlifes', $wildlife)
            ->with('searchGenus', $searchGenus)
            ->with('searchDate', $searchDate);
    }

    public function sortNameAsc()
    {

        $searchClass = DB::table('wildlife')
            ->select('wildlife.wildlife_class')
            ->distinct('wildlife.wildlife_class')
            ->where('wildlife_type', 'Zoo')
            ->get();

        $searchSpecie = DB::table('wildlife')
            ->select('wildlife.wildlife_species')
            ->distinct('wildlife.wildlife_species')
            ->where('wildlife_type', 'Zoo')
            ->get();

        $searchLoc = DB::table('wildlife')
            ->select('wildlife.wildlife_location')
            ->distinct('wildlife.wildlife_location')
            ->where('wildlife_type', 'Zoo')
            ->get();

        $wildlife = Wildlife::where('wildlife_type', 'Zoo')
            ->orderBy('wildlife_name', 'ASC')
            ->get();
        return view('IEMS.Linus.GUEST.GuestWLDashboard')
            ->with('studentDashboard', $wildlife)
            ->with('searchClass', $searchClass)
            ->with('searchSpecie', $searchSpecie)
            ->with('searchLoc', $searchLoc);
    }
    public function sortNameAscB_G()
    {

        $searchGenus = DB::table('wildlife')
            ->select('wildlife.wildlife_genus')
            ->distinct('wildlife.wildlife_genus')
            ->where('wildlife_type', 'Bone')
            ->get();

        $searchDate = DB::table('wildlife')
            ->select('wildlife.date_added')
            ->distinct('wildlife.date_added')
            ->where('wildlife_type', 'Bone')
            ->get();



        $wildlife = Wildlife::where('wildlife_type', 'Bone')
            ->orderBy('wildlife_name', 'ASC')
            ->get();

        return view('IEMS.Linus.GUEST.GuestBoneCollection')
            ->with('wildlifes', $wildlife)
            ->with('searchGenus', $searchGenus)
            ->with('searchDate', $searchDate);
    }
    public function sortNameAscR_G()
    {

        $searchGenus = DB::table('wildlife')
            ->select('wildlife.wildlife_genus')
            ->distinct('wildlife.wildlife_genus')
            ->where('wildlife_type', 'Reference')
            ->get();

        $searchDate = DB::table('wildlife')
            ->select('wildlife.date_added')
            ->distinct('wildlife.date_added')
            ->where('wildlife_type', 'Reference')
            ->get();

        $wildlife = Wildlife::where('wildlife_type', 'Reference')
            ->orderBy('wildlife_name', 'ASC')
            ->get();

        return view('IEMS.Linus.GUEST.GuestRefCollection')
            ->with('wildlifes', $wildlife)
            ->with('searchGenus', $searchGenus)
            ->with('searchDate', $searchDate);
    }

    public function dateAddedDesc()
    {

        $searchClass = DB::table('wildlife')
            ->select('wildlife.wildlife_class')
            ->distinct('wildlife.wildlife_class')
            ->where('wildlife_type', 'Zoo')
            ->get();

        $searchSpecie = DB::table('wildlife')
            ->select('wildlife.wildlife_species')
            ->distinct('wildlife.wildlife_species')
            ->where('wildlife_type', 'Zoo')
            ->get();

        $searchLoc = DB::table('wildlife')
            ->select('wildlife.wildlife_location')
            ->distinct('wildlife.wildlife_location')
            ->where('wildlife_type', 'Zoo')
            ->get();

        $wildlife = Wildlife::where('wildlife_type', 'Zoo')
            ->orderBy('wildlife_name', 'DESC')
            ->get();
        return view('IEMS.Linus.GUEST.GuestWLDashboard')
            ->with('studentDashboard', $wildlife)
            ->with('searchClass', $searchClass)
            ->with('searchSpecie', $searchSpecie)
            ->with('searchLoc', $searchLoc);
    }
    public function dateAddedDescB_G()
    {

        $searchGenus = DB::table('wildlife')
            ->select('wildlife.wildlife_genus')
            ->distinct('wildlife.wildlife_genus')
            ->where('wildlife_type', 'Bone')
            ->get();

        $searchDate = DB::table('wildlife')
            ->select('wildlife.date_added')
            ->distinct('wildlife.date_added')
            ->where('wildlife_type', 'Bone')
            ->get();

        $wildlife = Wildlife::where('wildlife_type', 'Bone')
            ->orderBy('wildlife_name', 'DESC')
            ->get();
        return view('IEMS.Linus.GUEST.GuestBoneCollection')
            ->with('wildlifes', $wildlife)
            ->with('searchGenus', $searchGenus)
            ->with('searchDate', $searchDate);
    }
    public function dateAddedDescR_G()
    {

        $searchGenus = DB::table('wildlife')
            ->select('wildlife.wildlife_genus')
            ->distinct('wildlife.wildlife_genus')
            ->where('wildlife_type', 'Reference')
            ->get();

        $searchDate = DB::table('wildlife')
            ->select('wildlife.date_added')
            ->distinct('wildlife.date_added')
            ->where('wildlife_type', 'Reference')
            ->get();

        $wildlife = Wildlife::where('wildlife_type', 'Reference')
            ->orderBy('wildlife_name', 'DESC')
            ->get();
        return view('IEMS.Linus.GUEST.GuestRefCollection')
            ->with('wildlifes', $wildlife)
            ->with('searchGenus', $searchGenus)
            ->with('searchDate', $searchDate);
    }


    public function dateAddedAsc()
    {

        $searchClass = DB::table('wildlife')
            ->select('wildlife.wildlife_class')
            ->distinct('wildlife.wildlife_class')
            ->where('wildlife_type', 'Zoo')
            ->get();

        $searchSpecie = DB::table('wildlife')
            ->select('wildlife.wildlife_species')
            ->distinct('wildlife.wildlife_species')
            ->where('wildlife_type', 'Zoo')
            ->get();

        $searchLoc = DB::table('wildlife')
            ->select('wildlife.wildlife_location')
            ->distinct('wildlife.wildlife_location')
            ->where('wildlife_type', 'Zoo')
            ->get();

        $wildlife = Wildlife::where('wildlife_type', 'Zoo')
            ->orderBy('wildlife_name', 'Asc')
            ->get();
        return view('IEMS.Linus.GUEST.GuestWLDashboard')
            ->with('studentDashboard', $wildlife)
            ->with('searchClass', $searchClass)
            ->with('searchSpecie', $searchSpecie)
            ->with('searchLoc', $searchLoc);
    }
    public function dateAddedAscB_G()
    {

        $searchGenus = DB::table('wildlife')
            ->select('wildlife.wildlife_genus')
            ->distinct('wildlife.wildlife_genus')
            ->where('wildlife_type', 'Bone')
            ->get();

        $searchDate = DB::table('wildlife')
            ->select('wildlife.date_added')
            ->distinct('wildlife.date_added')
            ->where('wildlife_type', 'Bone')
            ->get();

        $wildlife = Wildlife::where('wildlife_type', 'Bone')
            ->orderBy('wildlife_name', 'ASC')
            ->get();
        return view('IEMS.Linus.GUEST.GuestBoneCollection')
            ->with('wildlifes', $wildlife)
            ->with('searchGenus', $searchGenus)
            ->with('searchDate', $searchDate);
    }
    public function dateAddedAscR_G()
    {

        $searchGenus = DB::table('wildlife')
            ->select('wildlife.wildlife_genus')
            ->distinct('wildlife.wildlife_genus')
            ->where('wildlife_type', 'Reference')
            ->get();

        $searchDate = DB::table('wildlife')
            ->select('wildlife.date_added')
            ->distinct('wildlife.date_added')
            ->where('wildlife_type', 'Reference')
            ->get();

        $wildlife = Wildlife::where('wildlife_type', 'Reference')
            ->orderBy('wildlife_name', 'Asc')
            ->get();
        return view('IEMS.Linus.GUEST.GuestRefCollection')
            ->with('wildlifes', $wildlife)
            ->with('searchGenus', $searchGenus)
            ->with('searchDate', $searchDate);
    }

    public function titleDesc()
    {

        $searchRef = DB::table('thesis_paper')
            ->select('thesis_paper.thesis_reference')
            ->distinct('thesis_paper.thesis_reference')
            ->get();

        $searchAuthor = DB::table('thesis_paper')
            ->select('thesis_paper.thesis_author')
            ->distinct('thesis_paper.thesis_author')
            ->get();

        $thesis = thesis_paper::orderBy('thesis_title', 'DESC')
            ->select('thesis_paper.*')
            ->get();

        return view('IEMS.Linus.GUEST.GuestThesisDashboard')
            ->with('thesis', $thesis)
            ->with('searchRef', $searchRef)
            ->with('searchAuthor', $searchAuthor);
    }
    public function titleAsc()
    {

        $searchRef = DB::table('thesis_paper')
            ->select('thesis_paper.thesis_reference')
            ->distinct('thesis_paper.thesis_reference')
            ->get();

        $searchAuthor = DB::table('thesis_paper')
            ->select('thesis_paper.thesis_author')
            ->distinct('thesis_paper.thesis_author')
            ->get();

        $thesis = thesis_paper::orderBy('thesis_title', 'ASC')
            ->select('thesis_paper.*')
            ->get();
        return view('IEMS.Linus.GUEST.GuestThesisDashboard')
            ->with('thesis', $thesis)
            ->with('searchRef', $searchRef)
            ->with('searchAuthor', $searchAuthor);
    }

    public function datePubDesc()
    {

        $searchRef = DB::table('thesis_paper')
            ->select('thesis_paper.thesis_reference')
            ->distinct('thesis_paper.thesis_reference')
            ->get();

        $searchAuthor = DB::table('thesis_paper')
            ->select('thesis_paper.thesis_author')
            ->distinct('thesis_paper.thesis_author')
            ->get();

        $thesis = thesis_paper::orderBy('date_published', 'DESC')
            ->select('thesis_paper.*')
            ->get();
        return view('IEMS.Linus.GUEST.GuestThesisDashboard')
            ->with('thesis', $thesis)
            ->with('searchRef', $searchRef)
            ->with('searchAuthor', $searchAuthor);
    }
    public function datePubAsc()
    {

        $searchRef = DB::table('thesis_paper')
            ->select('thesis_paper.thesis_reference')
            ->distinct('thesis_paper.thesis_reference')
            ->get();

        $searchAuthor = DB::table('thesis_paper')
            ->select('thesis_paper.thesis_author')
            ->distinct('thesis_paper.thesis_author')
            ->get();

        $thesis = thesis_paper::orderBy('date_published', 'ASC')
            ->select('thesis_paper.*')
            ->get();
        return view('IEMS.Linus.GUEST.GuestThesisDashboard')
            ->with('thesis', $thesis)
            ->with('searchRef', $searchRef)
            ->with('searchAuthor', $searchAuthor);
    }

    public function authorDesc()
    {

        $searchRef = DB::table('thesis_paper')
            ->select('thesis_paper.thesis_reference')
            ->distinct('thesis_paper.thesis_reference')
            ->get();

        $searchAuthor = DB::table('thesis_paper')
            ->select('thesis_paper.thesis_author')
            ->distinct('thesis_paper.thesis_author')
            ->get();

        $thesis = thesis_paper::orderBy('thesis_author', 'DESC')
            ->select('thesis_paper.*')
            ->get();
        return view('IEMS.Linus.GUEST.GuestThesisDashboard')
            ->with('thesis', $thesis)
            ->with('searchRef', $searchRef)
            ->with('searchAuthor', $searchAuthor);
    }
    public function authorAsc()
    {

        $searchRef = DB::table('thesis_paper')
            ->select('thesis_paper.thesis_reference')
            ->distinct('thesis_paper.thesis_reference')
            ->get();

        $searchAuthor = DB::table('thesis_paper')
            ->select('thesis_paper.thesis_author')
            ->distinct('thesis_paper.thesis_author')
            ->get();

        $thesis = thesis_paper::orderBy('thesis_author', 'ASC')
            ->select('thesis_paper.*')
            ->get();
        return view('IEMS.Linus.GUEST.GuestThesisDashboard')
            ->with('thesis', $thesis)
            ->with('searchRef', $searchRef)
            ->with('searchAuthor', $searchAuthor);
    }

    public function j_titleDesc()
    {
        $searchRef = DB::table('journal_article')
            ->select('journal_article.journal_reference')
            ->distinct('journal_article.journal_reference')
            ->get();

        $searchDate = DB::table('journal_article')
            ->select('journal_article.date_published')
            ->distinct('journal_article.date_published')
            ->get();


        $journal = journal_article::orderBy('journal_title', 'DESC')
            ->get();
        return view('IEMS.Linus.GUEST.GuestJournalDashboard')
            ->with('journal', $journal)
            ->with('searchDate', $searchDate)
            ->with('searchRef', $searchRef);
    }
    public function j_titleAsc()
    {
        $searchRef = DB::table('journal_article')
            ->select('journal_article.journal_reference')
            ->distinct('journal_article.journal_reference')
            ->get();

        $searchDate = DB::table('journal_article')
            ->select('journal_article.date_published')
            ->distinct('journal_article.date_published')
            ->get();


        $journal = journal_article::orderBy('journal_title', 'ASC')
            ->get();
        return view('IEMS.Linus.GUEST.GuestJournalDashboard')
            ->with('journal', $journal)
            ->with('searchDate', $searchDate)
            ->with('searchRef', $searchRef);
    }

    public function j_datePubDesc()
    {
        $searchRef = DB::table('journal_article')
            ->select('journal_article.journal_reference')
            ->distinct('journal_article.journal_reference')
            ->get();

        $searchDate = DB::table('journal_article')
            ->select('journal_article.date_published')
            ->distinct('journal_article.date_published')
            ->get();


        $journal = journal_article::orderBy('date_published', 'DESC')
            ->get();
        return view('IEMS.Linus.GUEST.GuestJournalDashboard')
            ->with('journal', $journal)
            ->with('searchDate', $searchDate)
            ->with('searchRef', $searchRef);
    }

    public function j_datePubAsc()
    {
        $searchRef = DB::table('journal_article')
            ->select('journal_article.journal_reference')
            ->distinct('journal_article.journal_reference')
            ->get();

        $searchDate = DB::table('journal_article')
            ->select('journal_article.date_published')
            ->distinct('journal_article.date_published')
            ->get();


        $journal = journal_article::orderBy('date_published', 'ASC')
            ->get();
        return view('IEMS.Linus.GUEST.GuestJournalDashboard')
            ->with('journal', $journal)
            ->with('searchDate', $searchDate)
            ->with('searchRef', $searchRef);
    }
    public function j_authorDesc()
    {
        $searchRef = DB::table('journal_article')
            ->select('journal_article.journal_reference')
            ->distinct('journal_article.journal_reference')
            ->get();

        $searchDate = DB::table('journal_article')
            ->select('journal_article.date_published')
            ->distinct('journal_article.date_published')
            ->get();


        $journal = journal_article::orderBy('journal_author', 'DESC')
            ->get();
        return view('IEMS.Linus.GUEST.GuestJournalDashboard')
            ->with('journal', $journal)
            ->with('searchDate', $searchDate)
            ->with('searchRef', $searchRef);
    }
    public function j_authorAsc()
    {
        $searchRef = DB::table('journal_article')
            ->select('journal_article.journal_reference')
            ->distinct('journal_article.journal_reference')
            ->get();

        $searchDate = DB::table('journal_article')
            ->select('journal_article.date_published')
            ->distinct('journal_article.date_published')
            ->get();


        $journal = journal_article::orderBy('journal_author', 'ASC')
            ->get();
        return view('IEMS.Linus.GUEST.GuestJournalDashboard')
            ->with('journal', $journal)
            ->with('searchDate', $searchDate)
            ->with('searchRef', $searchRef);
    }
}
