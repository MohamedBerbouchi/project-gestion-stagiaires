<?php

namespace App\Http\Controllers;

use App\Models\Attestation;
use Illuminate\Http\Request;
USE PDF;
use Elibyy\TCPDF\Facades\TCPDF;
use App\Models\Stagiaire;

class AttestationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attestation  $attestation
     * @return \Illuminate\Http\Response
     */
    public function show(Attestation $attestation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attestation  $attestation
     * @return \Illuminate\Http\Response
     */
    public function edit(Attestation $attestation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attestation  $attestation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attestation $attestation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attestation  $attestation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attestation $attestation)
    {
        //
    }

    public function impression($id)
    {
        $stagiaire = Stagiaire::find($id);
        return view('stagiaire.impression',compact('stagiaire'));


    }

    public function imprimerLaAttestationInscription($id)
    {
        $pdf = new TCPDF('P', 'mm', 'A5');
        $retrait = "   ";
        $nom_prenom = "ayoub moustakim" ." =>>>". $id;
        $cne = "AA676767";
        $pdf::AddPage();
        $pdf::Image('en-tete.png', 10, 5, 130, 20);
        $pdf::Ln(18);
        $pdf::SetFont('', 'B', 16);
        $logo = "public\assets\img\immm.jpg";
        $largeur_page = $pdf::getPageWidth();
        $position_x = ($largeur_page / 2) - 25; // 25 étant la moitié de la largeur de l'image
        $pdf::Image($logo, $position_x, 10, 50, 0, 'JPG', '', '', true, 150);
        $pdf::Ln(5);
        $pdf::Cell(0, 10,'office de la formation professionnelle et de la promotion du travail', 'TB', 1, 'C');
        $pdf::Ln(9);
        $pdf::SetFont('', '', 10);
        $h = 7;
        $retrait = "      ";
        $pdf::Write($h, "Le Doyen de la Faculté des Sciences et Techniques de Marrakech soussigne, atteste que l'etudiant (e) :\n");
        $pdf::Ln(3);
        $pdf::SetFont('', 'BI');
        $pdf::Write($h, $retrait.$nom_prenom );
        $pdf::Write($h, $retrait.$retrait .$retrait .$retrait .$retrait.$retrait. " C.N.E " . $cne . "\n" );
        $pdf::Ln(3);
        $pdf::SetFont('', '');
        $ingenieur = 'ingenieur';
        $pdf::Write($h, $retrait . "Né (e) Le : ");
        $pdf::SetFont('', 'BI');
        $pdf::Write($h, $retrait .  "1999/10/1999");
        $pdf::SetFont('', '');
        $pdf::Write($h,' à ' );
        $pdf::SetFont('', 'BI');
        $pdf::Write($h,  "MARRAKECH" . " \n" );
        $pdf::SetFont('', '');

        $pdf::Ln(3);
        $pdf::Write($h, $retrait . "Titulaire d'un : ");
        $pdf::SetFont('', 'BI');
        $pdf::Write($h,    "BAC" . " \n");
        $pdf::SetFont('', '');

        $pdf::Ln(3);
        $pdf::Write($h, $retrait . "Délivre par : " );
        $pdf::SetFont('', 'BI');
        $pdf::Write($h,  "JJJJJJJJJJJJJJJ");
        $pdf::Write($h,  ' Marrakech'." \n");
        $pdf::SetFont('', '');


        $pdf::Ln(3);
        $pdf::Write($h, $retrait . "est inscrit (e) a cet établissement au titre de l'année universitaire : ");
        $pdf::SetFont('', 'BI');
        $n1 = 2023 + 1;
        $pdf::Write($h, "2023".'/'.  $n1 . " \n");
        $pdf::SetFont('', '');


        // $pdf::Ln(3);
        $pdf::Write($h, $retrait . "Sous le numéro : ");
        $pdf::SetFont('', 'BI');
        $pdf::Write($h,  $retrait.$retrait.$retrait.$retrait. "FD666"." \n");
        $pdf::SetFont('', '');

        $pdf::Ln(3);
        $pdf::Write($h, $retrait . "En première année Doctorat :" ."\n");
        $pdf::Ln(3);
        $pdf::Write($h, $retrait . "intitulé de la Formation Doctorale :". "  \n");
        $pdf::Ln(3);
        $pdf::SetFont('', 'BI');
        $pdf::Write($h, $retrait. "HJGFGFGFG". " \n");
        $pdf::SetFont('', '');
        $pdf::Ln(3);
        $pdf::Write($h, $retrait .$retrait.$retrait.$retrait.$retrait.$retrait.$retrait.$retrait. "Marrakech le " );
        $pdf::SetFont('', 'BI');
        $pdf::Write($h,  date('d/m/Y') . "  \n"  );
        $pdf::SetFont('', '');
        $name_file = 'PDF\Attestation_inscription\hello_world.pdf';
        // $pdf::Output($name_file, 'D');
        $pdf::Output(public_path($name_file), 'F');
        return response()->download(public_path($name_file));
    }
    public function imprimerLaAttestationDeScolarite($id)
    {
        $pdf = new TCPDF('P', 'mm', 'A5');
        $retrait = "   ";
        $nom_prenom = "ayoub moustakim"." =>>>". $id;
        $cne = "AA676767";
        $pdf::AddPage();
        $pdf::Image('en-tete.png', 10, 5, 130, 20);
        $pdf::Ln(18);
        $pdf::SetFont('', 'B', 16);
        $logo = "public\assets\img\immm.jpg";
        $largeur_page = $pdf::getPageWidth();
        $position_x = ($largeur_page / 2) - 25; // 25 étant la moitié de la largeur de l'image
        $pdf::Image($logo, $position_x, 10, 50, 0, 'JPG', '', '', true, 150);
        $pdf::Ln(5);
        $pdf::Cell(0, 10,'office de la formation professionnelle et de la promotion du travail', 'TB', 1, 'C');
        $pdf::Ln(9);
        $pdf::SetFont('', '', 10);
        $h = 7;
        $retrait = "      ";
        $pdf::Write($h, "Le Doyen de la Faculté des Sciences et Techniques de Marrakech soussigne, atteste que l'etudiant (e) :\n");
        $pdf::Ln(3);
        $pdf::SetFont('', 'BI');
        $pdf::Write($h, $retrait.$nom_prenom );
        $pdf::Write($h, $retrait.$retrait .$retrait .$retrait .$retrait.$retrait. " C.N.E " . $cne . "\n" );
        $pdf::Ln(3);
        $pdf::SetFont('', '');
        $ingenieur = 'ingenieur';
        $pdf::Write($h, $retrait . "Né (e) Le : ");
        $pdf::SetFont('', 'BI');
        $pdf::Write($h, $retrait .  "1999/10/1999");
        $pdf::SetFont('', '');
        $pdf::Write($h,' à ' );
        $pdf::SetFont('', 'BI');
        $pdf::Write($h,  "MARRAKECH" . " \n" );
        $pdf::SetFont('', '');

        $pdf::Ln(3);
        $pdf::Write($h, $retrait . "Titulaire d'un : ");
        $pdf::SetFont('', 'BI');
        $pdf::Write($h,    "BAC" . " \n");
        $pdf::SetFont('', '');

        $pdf::Ln(3);
        $pdf::Write($h, $retrait . "Délivre par : " );
        $pdf::SetFont('', 'BI');
        $pdf::Write($h,  "JJJJJJJJJJJJJJJ");
        $pdf::Write($h,  ' Marrakech'." \n");
        $pdf::SetFont('', '');


        $pdf::Ln(3);
        $pdf::Write($h, $retrait . "est inscrit (e) a cet établissement au titre de l'année universitaire : ");
        $pdf::SetFont('', 'BI');
        $n1 = 2023 + 1;
        $pdf::Write($h, "2023".'/'.  $n1 . " \n");
        $pdf::SetFont('', '');


        // $pdf::Ln(3);
        $pdf::Write($h, $retrait . "Sous le numéro : ");
        $pdf::SetFont('', 'BI');
        $pdf::Write($h,  $retrait.$retrait.$retrait.$retrait. "FD666"." \n");
        $pdf::SetFont('', '');

        $pdf::Ln(3);
        $pdf::Write($h, $retrait . "En première année Doctorat :" ."\n");
        $pdf::Ln(3);
        $pdf::Write($h, $retrait . "intitulé de la Formation Doctorale :". "  \n");
        $pdf::Ln(3);
        $pdf::SetFont('', 'BI');
        $pdf::Write($h, $retrait. "HJGFGFGFG". " \n");
        $pdf::SetFont('', '');
        $pdf::Ln(3);
        $pdf::Write($h, $retrait .$retrait.$retrait.$retrait.$retrait.$retrait.$retrait.$retrait. "Marrakech le " );
        $pdf::SetFont('', 'BI');
        $pdf::Write($h,  date('d/m/Y') . "  \n"  );
        $pdf::SetFont('', '');
        $name_file = 'PDF\Attestation_scolarite\hello_world.pdf';
        // $pdf::Output($name_file, 'D');
        $pdf::Output(public_path($name_file), 'F');
        return response()->download(public_path($name_file));
    }



    public function imprimerLaDemandeDeStage($id)
    {

        $pdf = new TCPDF('P', 'mm', 'A5');
        $retrait = "   ";
        $nom_prenom = "ayoub moustakim"." =>>>". $id;
        $cne = "AA676767";
        $pdf::AddPage();
        $pdf::Image('en-tete.png', 10, 5, 130, 20);
        $pdf::Ln(18);
        $pdf::SetFont('', 'B', 16);
        $logo = "public\assets\img\immm.jpg";
        $largeur_page = $pdf::getPageWidth();
        $position_x = ($largeur_page / 2) - 25; // 25 étant la moitié de la largeur de l'image
        $pdf::Image($logo, $position_x, 10, 50, 0, 'JPG', '', '', true, 150);
        $pdf::Ln(5);
        $pdf::Cell(0, 10,'office de la formation professionnelle et de la promotion du travail', 'TB', 1, 'C');
        $pdf::Ln(9);
        $pdf::SetFont('', '', 10);
        $h = 7;
        $retrait = "      ";
        $pdf::Write($h, "Le Doyen de la Faculté des Sciences et Techniques de Marrakech soussigne, atteste que l'etudiant (e) :\n");
        $pdf::Ln(3);
        $pdf::SetFont('', 'BI');
        $pdf::Write($h, $retrait.$nom_prenom );
        $pdf::Write($h, $retrait.$retrait .$retrait .$retrait .$retrait.$retrait. " C.N.E " . $cne . "\n" );
        $pdf::Ln(3);
        $pdf::SetFont('', '');
        $ingenieur = 'ingenieur';
        $pdf::Write($h, $retrait . "Né (e) Le : ");
        $pdf::SetFont('', 'BI');
        $pdf::Write($h, $retrait .  "1999/10/1999");
        $pdf::SetFont('', '');
        $pdf::Write($h,' à ' );
        $pdf::SetFont('', 'BI');
        $pdf::Write($h,  "MARRAKECH" . " \n" );
        $pdf::SetFont('', '');

        $pdf::Ln(3);
        $pdf::Write($h, $retrait . "Titulaire d'un : ");
        $pdf::SetFont('', 'BI');
        $pdf::Write($h,    "BAC" . " \n");
        $pdf::SetFont('', '');

        $pdf::Ln(3);
        $pdf::Write($h, $retrait . "Délivre par : " );
        $pdf::SetFont('', 'BI');
        $pdf::Write($h,  "JJJJJJJJJJJJJJJ");
        $pdf::Write($h,  ' Marrakech'." \n");
        $pdf::SetFont('', '');


        $pdf::Ln(3);
        $pdf::Write($h, $retrait . "est inscrit (e) a cet établissement au titre de l'année universitaire : ");
        $pdf::SetFont('', 'BI');
        $n1 = 2023 + 1;
        $pdf::Write($h, "2023".'/'.  $n1 . " \n");
        $pdf::SetFont('', '');


        // $pdf::Ln(3);
        $pdf::Write($h, $retrait . "Sous le numéro : ");
        $pdf::SetFont('', 'BI');
        $pdf::Write($h,  $retrait.$retrait.$retrait.$retrait. "FD666"." \n");
        $pdf::SetFont('', '');

        $pdf::Ln(3);
        $pdf::Write($h, $retrait . "En première année Doctorat :" ."\n");
        $pdf::Ln(3);
        $pdf::Write($h, $retrait . "intitulé de la Formation Doctorale :". "  \n");
        $pdf::Ln(3);
        $pdf::SetFont('', 'BI');
        $pdf::Write($h, $retrait. "HJGFGFGFG". " \n");
        $pdf::SetFont('', '');
        $pdf::Ln(3);
        $pdf::Write($h, $retrait .$retrait.$retrait.$retrait.$retrait.$retrait.$retrait.$retrait. "Marrakech le " );
        $pdf::SetFont('', 'BI');
        $pdf::Write($h,  date('d/m/Y') . "  \n"  );
        $pdf::SetFont('', '');
        $name_file = 'PDF\Demande_Stage\hello_world.pdf';
        // $pdf::Output($name_file, 'D');
        $pdf::Output(public_path($name_file), 'F');
        return response()->download(public_path($name_file));

    }

}
