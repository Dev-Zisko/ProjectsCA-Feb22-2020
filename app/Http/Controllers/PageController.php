<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Exception;
use Auth;
use App\Organization;
use App\User;
use App\Initiative;
use App\Action;
use App\Godparent;

class PageController extends Controller
{
    //###############################################################
    //Controller Views
    //###############################################################

    public function view_login()
    {
        return view('auth.login');
    }

    public function view_metrics()
    {
        return view('metrics');
    }

    public function view_metricsorganizations()
    {
        $organizations = \DB::table('organizations')->get();
        $count = count($organizations);
        return view('metricsorganizations', compact('count'));
    }

    public function view_metricsinitiatives()
    {
        $initiatives = \DB::table('initiatives')->get();
        $count = count($initiatives);
        return view('metricsinitiatives', compact('count'));
    }

    public function view_error()
    {
        $mensaje = "Página de error";
        return view('error', compact('mensaje'));
    }

    public function view_users()
    {
        try{
            $users = \DB::table('users')->paginate(30);
            return view('users', compact('users'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        }
    }

    public function view_rusers()
    {
        try{
            return view('rusers');
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        }        
    }

    public function view_uusers($id){
        try{
            $newid = Crypt::decrypt($id);
            $user = User::find($newid);
            return view('uusers', compact('user'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_dusers($id){
        try{
            $newid = Crypt::decrypt($id);
            $user = User::find($newid);
            return view('dusers', compact('user'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_organizations()
    {
        try{
            $organizations = \DB::table('organizations')->paginate(30);
            return view('organizations', compact('organizations'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        }
    }

    public function view_rorganizations()
    {
        try{
            return view('rorganizations');
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        }        
    }

    public function view_uorganizations($id){
        try{
            $newid = Crypt::decrypt($id);
            $organization = Organization::find($newid);
            return view('uorganizations', compact('organization'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_dorganizations($id){
        try{
            $newid = Crypt::decrypt($id);
            $organization = Organization::find($newid);
            return view('dorganizations', compact('organization'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_initiatives()
    {
        try{
            $initiatives = \DB::table('initiatives')->paginate(15);
            $actions = \DB::table('actions')->get();
            $orgaini = \DB::table('orga-ini')->get();
            $organizations = \DB::table('organizations')->get();
            $prueba = array();
            foreach($initiatives as $initiative){
                $orga = "";
                foreach($orgaini as $rela){
                    foreach($organizations as $organization){
                        if($rela->id_initiative == $initiative->id){
                            if($rela->id_organization == $organization->id){
                                array_push($prueba, $initiative->name);
                                array_push($prueba, $organization->name);
                                array_push($prueba, "-");
                            }                     
                        }
                    }
                }
            }
            return view('initiatives', compact('initiatives', 'actions', 'organizations', 'orgaini'));
        }catch(Exception $ex){
            dd($ex);
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        }
    }

    public function view_rinitiatives()
    {
        try{
            $organizations = \DB::table('organizations')->get();
            return view('rinitiatives', compact('organizations'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        }        
    }

    public function view_uinitiatives($id){
        try{
            $newid = Crypt::decrypt($id);
            $initiative = Initiative::find($newid);
            $inis = \DB::table('initiatives')->orderBy('name', 'ASC')->paginate(30);
            $actions = \DB::table('actions')->get();
            $mandatories = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12");
            $idskick = array();
            $allids = array();
            foreach($actions as $action){
                if($action->action == "1"){
                    unset($mandatories[0]);
                }
                else if($action->action == "2"){
                    unset($mandatories[1]);
                }
                else if($action->action == "3"){
                    unset($mandatories[2]);
                }
                else if($action->action == "4"){
                    unset($mandatories[3]);
                }
                else if($action->action == "5"){
                    unset($mandatories[4]);
                }
                else if($action->action == "6"){
                    unset($mandatories[5]);
                }
                else if($action->action == "7"){
                    unset($mandatories[6]);
                }
                else if($action->action == "8"){
                    unset($mandatories[7]);
                }
                else if($action->action == "9"){
                    unset($mandatories[8]);
                }
                else if($action->action == "10"){
                    unset($mandatories[9]);
                }
                else if($action->action == "11"){
                    unset($mandatories[10]);
                }
                else if($action->action == "12"){
                    unset($mandatories[11]);
                }
            }
            $orgaini = \DB::table('orga-ini')->where('id_initiative', $newid)->get();
            foreach($orgaini as $orga){
                array_push($idskick, $orga->id_organization);
            }
            $organizations = \DB::table('organizations')->get();
            $orgas = \DB::table('organizations')->get();
            foreach($organizations as $organi){
                array_push($allids, $organi->id);
            }
            $dif = array_diff($allids, $idskick);
            $aux = array();
            foreach($dif as $di){
              foreach($organizations as $organization){
                if($organization->id == $di){
                  array_push($aux, $organization);
                }
              }
            }
            return view('uinitiatives', compact('initiative', 'actions', 'organizations', 'orgaini', 'inis', 'mandatories', 'orgas', 'aux'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_dinitiatives($id){
        try{
            $newid = Crypt::decrypt($id);
            $initiative = Initiative::find($newid);
            $organizations = \DB::table('organizations')->get();
            $initiatives = \DB::table('initiatives')->where('name', $initiative->name)->orderBy('name', 'ASC')->paginate(30);
            $orgaini = \DB::table('orga-ini')->where('id_initiative', $newid)->get();
            return view('dinitiatives', compact('initiative', 'organizations', 'initiatives', 'orgaini'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_alphabetical()
    {
        try{
            $organizations = \DB::table('organizations')->orderBy('name', 'ASC')->paginate(30);
            $order = "Ascendente";
            return view('alphabetical', compact('organizations', 'order'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        }
    }

    public function view_galphabetical()
    {
        try{
            $godparents = \DB::table('godparents')->orderBy('name', 'ASC')->paginate(30);
            $order = "Ascendente";
            return view('galphabetical', compact('godparents', 'order'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        }
    }

    public function view_names()
    {
        try{
            $initiatives = \DB::table('initiatives')->paginate(15);
            $inis = \DB::table('initiatives')->orderBy('name', 'ASC')->paginate(30);
            $actions = \DB::table('actions')->get();
            $orgaini = \DB::table('orga-ini')->get();
            $organizations = \DB::table('organizations')->get();
            return view('names', compact('initiatives', 'actions', 'organizations', 'orgaini', 'inis'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        }
    }

    public function view_states()
    {
        try{
            $states = \DB::table('organizations')->orderBy('state', 'ASC')->get('state');
            $states = $states->unique();
            $organizations = \DB::table('organizations')->orderBy('name', 'ASC')->paginate(30);
            return view('states', compact('organizations', 'states'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        }
    }

    public function view_sectors()
    {
        try{
            $sectors = \DB::table('organizations')->orderBy('type', 'ASC')->get('type');
            $sectors = $sectors->unique();
            $organizations = \DB::table('organizations')->orderBy('name', 'ASC')->paginate(30);
            return view('sectors', compact('organizations', 'sectors'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        }
    }

    public function view_gstates()
    {
        try{
            $states = \DB::table('godparents')->orderBy('state', 'ASC')->get('state');
            $states = $states->unique();
            $godparents = \DB::table('godparents')->orderBy('name', 'ASC')->paginate(30);
            return view('gstates', compact('godparents', 'states'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        }
    }

    public function view_gsectors()
    {
        try{
            $sectors = \DB::table('godparents')->orderBy('type', 'ASC')->get('type');
            $sectors = $sectors->unique();
            $godparents = \DB::table('godparents')->orderBy('name', 'ASC')->paginate(30);
            return view('gsectors', compact('godparents', 'sectors'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        }
    }

    public function view_actions()
    {
        try{
            $initiatives = \DB::table('initiatives')->paginate(15);
            $inis = \DB::table('initiatives')->orderBy('name', 'ASC')->paginate(30);
            $actions = \DB::table('actions')->get();
            $orgaini = \DB::table('orga-ini')->get();
            $organizations = \DB::table('organizations')->get();
            return view('actions', compact('initiatives', 'actions', 'organizations', 'orgaini', 'inis'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        }
    }
    
    public function view_istates()
    {
        try{
            $states = \DB::table('initiatives')->orderBy('state', 'ASC')->get('state');
            $states = $states->unique();
            $initiatives = \DB::table('initiatives')->orderBy('name', 'ASC')->paginate(15);
            return view('istates', compact('initiatives', 'states'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        }
    }

    public function view_detailini($id){
        try{
            $newid = Crypt::decrypt($id);
            $initiative = Initiative::find($newid);
            $actions = \DB::table('actions')->where('id_initiative', $newid)->get();
            $initiatives = \DB::table('initiatives')->where('name', $initiative->name)->orderBy('name', 'ASC')->paginate(30);
            $orgaini = \DB::table('orga-ini')->where('id_initiative', $newid)->get();
            $organizations = \DB::table('organizations')->get();
            return view('detailini', compact('initiative', 'initiatives', 'actions', 'orgaini', 'organizations'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_detailorga($id){
        try{
            $newid = Crypt::decrypt($id);
            $organization = Organization::find($newid);
            return view('detailorga', compact('organization'));
        }catch(Exception $ex){
            dd($ex);
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_godparents()
    {
        try{
            $godparents = \DB::table('godparents')->paginate(30);
            return view('godparents', compact('godparents'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        }
    }

    public function view_rgodparents()
    {
        try{
            return view('rgodparents');
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        }        
    }

    public function view_ugodparents($id){
        try{
            $newid = Crypt::decrypt($id);
            $godparent = Godparent::find($newid);
            return view('ugodparents', compact('godparent'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_dgodparents($id){
        try{
            $newid = Crypt::decrypt($id);
            $godparent = Godparent::find($newid);
            return view('dgodparents', compact('godparent'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_detailgodparent($id){
        try{
            $newid = Crypt::decrypt($id);
            $godparent = Godparent::find($newid);
            return view('detailgodparent', compact('godparent'));
        }catch(Exception $ex){
            dd($ex);
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        } 
    }

    //###############################################################
    //Controller Users
    //###############################################################

    public function register_users(Request $request){
        try{
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect('users'); 
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar los datos del usuario correctamente. Puede que ya el usuario este creado.";
            return view('error', compact('mensaje'));
        }  
    }

    public function update_users(Request $request, $id){
        try{
            $newid = Crypt::decrypt($id);
            \DB::table('users')->where('id', $newid)->update(['name'=>$request->name]);
            \DB::table('users')->where('id', $newid)->update(['email'=>$request->email]);
            if($request->password != "" || $request->password != null){
                \DB::table('users')->where('id', $newid)->update(['password'=>Hash::make($request->password)]);  
            }
            return redirect('users'); 
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar los datos del perfil correctamente en el formulario. Puede que algún campo único ya este en uso.";
            return view('error', compact('mensaje'));
        }   
    }

    public function delete_users($id){
        try{
            $newid = Crypt::decrypt($id);
            \DB::table('users')->where('id', $newid)->delete();
            return redirect('users');
        }catch(Exception $ex){
            $mensaje = "Error al eliminar el usuario.";
            return view('error', compact('mensaje'));
        }  
    }

    //###############################################################
    //Controller Organizations
    //###############################################################

    public function register_organizations(Request $request)
    {
        try{
            $organization = new Organization;
            $organization->name = $request->name;
            $organization->state = $request->state;
            $organization->id_organization = $request->name . "-" . $request->state;
            $organization->type = $request->type;
            $organization->person_contact = $request->person_contact;
            $organization->person_position = $request->person_position;
            $organization->person_mail = $request->person_mail;
            $organization->person_cellphone = $request->person_cellphone;
            $organization->save();
            return redirect('organizations');
        }catch(Exception $ex){
            $mensaje = "Error al registar la organización, puede que algun valor tenga más de 255 caracteres verifique los datos e intente nuevamente.";
            return view('error', compact('mensaje'));
        }
    }

    public function update_organizations(Request $request, $id)
    {
        try{
            $newid = Crypt::decrypt($id);
            \DB::table('organizations')->where('id', $newid)->update(['name'=>$request->name]);
            \DB::table('organizations')->where('id', $newid)->update(['state'=>$request->state]);
            \DB::table('organizations')->where('id', $newid)->update(['id_organization'=>$request->name . "-" . $request->state]);
            \DB::table('organizations')->where('id', $newid)->update(['type'=>$request->type]);
            \DB::table('organizations')->where('id', $newid)->update(['person_contact'=>$request->person_contact]);
            \DB::table('organizations')->where('id', $newid)->update(['person_position'=>$request->person_position]);
            \DB::table('organizations')->where('id', $newid)->update(['person_mail'=>$request->person_mail]);
            \DB::table('organizations')->where('id', $newid)->update(['person_cellphone'=>$request->person_cellphone]);
            return redirect('organizations');
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar los datos de la organización correctamente en el formulario. Puede que algun valor tenga más de 255 caracteres o que algún campo único ya este en uso.";
            return view('error', compact('mensaje'));
        }
    }

    public function delete_organizations(Request $request, $id)
    {
        try{
            $newid = Crypt::decrypt($id);
            $initiatives = \DB::table('orga-ini')->where('id_organization', $newid)->get();
            \DB::table('orga-ini')->where('id_organization', $newid)->delete();
            foreach($initiatives as $initiative){
                \DB::table('actions')->where('id_initiative', $initiative->id)->delete();
                \DB::table('initiatives')->where('id', $initiative->id)->delete();
            }      
            \DB::table('organizations')->where('id', $newid)->delete();
            return redirect('organizations');
        }catch(Exception $ex){
            $mensaje = "Error al eliminar la organización.";
            return view('error', compact('mensaje'));
        }
    }

    //###############################################################
    //Controller Initiatives
    //###############################################################

    public function register_initiatives(Request $request)
    {
        try{
            $idorganization = $request->id_organization;
            $organizations = collect();
            $idmandatories = $request->mandatories;
            $mandatories = "";
            $initiative = new Initiative;
            $initiative->name = $request->name;
            $initiative->postname = $request->postname;
            $initiative->status = $request->status;               
            $initiative->observation = $request->observation;
            $initiative->state = $request->state;
            foreach($idmandatories as $idmand){
                $mandatories = $mandatories . "   " . $idmand;
            }
            $initiative->mandatories = $mandatories;
            $initiative->save();
            $ini = Initiative::all();
            $inilast = $ini->last();
            foreach($idmandatories as $idmand){
                $action = new Action;
                $action->action = $idmand;                
                $action->id_initiative = $inilast->id;
                $action->save();
            }
            foreach($idorganization as $id){
                \DB::table('orga-ini')->insert(['id_organization' => $id, 'id_initiative' => $inilast->id]);
            }        
            return redirect('initiatives');
        }catch(Exception $ex){
            $mensaje = "Error al registrar la iniciativa. Puede que algun valor tenga más de 255 caracteres o algún campo único ya este en uso, verifique los datos e intente nuevamente.";
            return view('error', compact('mensaje'));
        }
    }

    public function update_initiatives(Request $request, $id)
    {
        try{
            $newid = Crypt::decrypt($id);
            \DB::table('initiatives')->where('id', $newid)->update(['name'=>$request->name]);
            \DB::table('initiatives')->where('id', $newid)->update(['postname'=>$request->postname]);
            \DB::table('initiatives')->where('id', $newid)->update(['status'=>$request->status]);
            \DB::table('initiatives')->where('id', $newid)->update(['observation'=>$request->observation]);
            \DB::table('initiatives')->where('id', $newid)->update(['state'=>$request->state]);
            $idmandatories = $request->mandatories;
            asort($idmandatories);
            $mandatories = "";
            foreach($idmandatories as $idmand){
                $mandatories = $mandatories . "   " . $idmand;
            }
            \DB::table('initiatives')->where('id', $newid)->update(['mandatories'=> $mandatories]);
            \DB::table('orga-ini')->where('id_initiative', $newid)->delete();
            $idorganization = $request->id_organization;
            asort($idorganization);
            foreach($idorganization as $id){
                \DB::table('orga-ini')->insert(['id_organization' => $id, 'id_initiative' => $newid]);
            }
            \DB::table('actions')->where('id_initiative', $newid)->delete();
            foreach($idmandatories as $idmand){
                $action = new Action;
                $action->action = $idmand;                
                $action->id_initiative = $newid;
                $action->save();
            }  
            return redirect('initiatives');
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar los datos de la iniciativa correctamente en el formulario. Puede que algun valor tenga más de 255 caracteres o que algún campo único ya este en uso.";
            return view('error', compact('mensaje'));
        }
    }

    public function delete_initiatives(Request $request, $id)
    {
        try{
            $newid = Crypt::decrypt($id);
            \DB::table('actions')->where('id_initiative', $newid)->delete();
            \DB::table('orga-ini')->where('id_initiative', $newid)->delete();
            \DB::table('initiatives')->where('id', $newid)->delete();
            return redirect('initiatives');
        }catch(Exception $ex){
            $mensaje = "Error al eliminar la iniciativa.";
            return view('error', compact('mensaje'));
        }
    }

    //###############################################################
    //Controller Godparents
    //###############################################################

    public function register_godparents(Request $request)
    {
        try{
            $godparent = new Godparent;
            $godparent->name = $request->name;
            $godparent->state = $request->state;
            $godparent->curriculum = $request->curriculum;
            $godparent->type = $request->type;
            $godparent->save();
            return redirect('godparents');
        }catch(Exception $ex){
            $mensaje = "Error al registar al padrino o madrina, por favor revise los datos e intente nuevamente.";
            return view('error', compact('mensaje'));
        }
    }

    public function update_godparents(Request $request, $id)
    {
        try{
            $newid = Crypt::decrypt($id);
            \DB::table('godparents')->where('id', $newid)->update(['name'=>$request->name]);
            \DB::table('godparents')->where('id', $newid)->update(['state'=>$request->state]);
            \DB::table('godparents')->where('id', $newid)->update(['curriculum'=>$request->curriculum]);
            \DB::table('godparents')->where('id', $newid)->update(['type'=>$request->type]);
            return redirect('godparents');
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar los datos del padrino o madrina correctamente en el formulario.";
            return view('error', compact('mensaje'));
        }
    }

    public function delete_godparents(Request $request, $id)
    {
        try{
            $newid = Crypt::decrypt($id);
            /*$initiatives = \DB::table('initiatives')->where('id_godparent', $newid)->get();
            foreach($initiatives as $initiative){
                \DB::table('initiatives')->where('id', $initiative->id)->update(['id_godparent'=>'0']);
            }*/ 
            \DB::table('godparents')->where('id', $newid)->delete();
            return redirect('godparents');
        }catch(Exception $ex){
            $mensaje = "Error al eliminar el padrino o madrina.";
            return view('error', compact('mensaje'));
        }
    }

    //###############################################################
    //Controller Filters
    //###############################################################

    public function order_alphabetical(Request $request)
    {
        try{
            if($request->order == "Ascendente"){
                $organizations = \DB::table('organizations')->orderBy('name', 'ASC')->paginate(30);
            }
            else if($request->order == "Descendente"){
                $organizations = \DB::table('organizations')->orderBy('name', 'DESC')->paginate(30);
            }
            $order = $request->order;
            return view('alphabetical', compact('organizations', 'order'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        }
    }

    public function order_galphabetical(Request $request)
    {
        try{
            if($request->order == "Ascendente"){
                $godparents = \DB::table('godparents')->orderBy('name', 'ASC')->paginate(30);
            }
            else if($request->order == "Descendente"){
                $godparents = \DB::table('godparents')->orderBy('name', 'DESC')->paginate(30);
            }
            $order = $request->order;
            return view('galphabetical', compact('godparents', 'order'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        }
    }

    public function order_initiatives(Request $request)
    {
        try{
            $inis = \DB::table('initiatives')->orderBy('name', 'ASC')->paginate(15);
            foreach($request->order as $order)
            if($order == "Todas"){
                $initiatives = \DB::table('initiatives')->orderBy('name', 'ASC')->paginate(15);
            }
            else{
                $initiatives = \DB::table('initiatives')->where('name', $request->order)->orderBy('name', 'ASC')->paginate(30);
            }       
            $actions = \DB::table('actions')->get();
            $orgaini = \DB::table('orga-ini')->get();
            $organizations = \DB::table('organizations')->get();
            return view('names', compact('initiatives', 'actions', 'organizations', 'orgaini', 'inis'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        }
    }

    public function order_states(Request $request)
    {
        try{
            $states = $request->order;
            $count = count($states);
            if($count == 1){
                if($states[0] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('state', 'LIKE', $states[0] . '%')->orderBy('state', 'ASC')->paginate(30);
                }   
            }
            else if($count == 2){
                if($states[0] == "Todos" || $states[1] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 3){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 4){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 5){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 6){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 7){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 8){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 9){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 10){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 11){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 12){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 13){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 14){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 15){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 16){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 17){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 18){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos" || $states[17] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orwhere('state', 'LIKE', $states[17] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 19){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos" || $states[17] == "Todos" || $states[18] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orwhere('state', 'LIKE', $states[17] . '%')->orwhere('state', 'LIKE', $states[18] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 20){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos" || $states[17] == "Todos" || $states[18] == "Todos" || $states[19] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orwhere('state', 'LIKE', $states[17] . '%')->orwhere('state', 'LIKE', $states[18] . '%')->orwhere('state', 'LIKE', $states[19] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 21){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos" || $states[17] == "Todos" || $states[18] == "Todos" || $states[19] == "Todos" || $states[20] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orwhere('state', 'LIKE', $states[17] . '%')->orwhere('state', 'LIKE', $states[18] . '%')->orwhere('state', 'LIKE', $states[19] . '%')->orwhere('state', 'LIKE', $states[20] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 22){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos" || $states[17] == "Todos" || $states[18] == "Todos" || $states[19] == "Todos" || $states[20] == "Todos" || $states[21] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orwhere('state', 'LIKE', $states[17] . '%')->orwhere('state', 'LIKE', $states[18] . '%')->orwhere('state', 'LIKE', $states[19] . '%')->orwhere('state', 'LIKE', $states[20] . '%')->orwhere('state', 'LIKE', $states[21] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 23){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos" || $states[17] == "Todos" || $states[18] == "Todos" || $states[19] == "Todos" || $states[20] == "Todos" || $states[21] == "Todos" || $states[22] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orwhere('state', 'LIKE', $states[17] . '%')->orwhere('state', 'LIKE', $states[18] . '%')->orwhere('state', 'LIKE', $states[19] . '%')->orwhere('state', 'LIKE', $states[20] . '%')->orwhere('state', 'LIKE', $states[21] . '%')->orwhere('state', 'LIKE', $states[22] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 24){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos" || $states[17] == "Todos" || $states[18] == "Todos" || $states[19] == "Todos" || $states[20] == "Todos" || $states[21] == "Todos" || $states[22] == "Todos" || $states[23] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orwhere('state', 'LIKE', $states[17] . '%')->orwhere('state', 'LIKE', $states[18] . '%')->orwhere('state', 'LIKE', $states[19] . '%')->orwhere('state', 'LIKE', $states[20] . '%')->orwhere('state', 'LIKE', $states[21] . '%')->orwhere('state', 'LIKE', $states[22] . '%')->orwhere('state', 'LIKE', $states[23] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 25){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos" || $states[17] == "Todos" || $states[18] == "Todos" || $states[19] == "Todos" || $states[20] == "Todos" || $states[21] == "Todos" || $states[22] == "Todos" || $states[23] == "Todos" || $states[24] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orwhere('state', 'LIKE', $states[17] . '%')->orwhere('state', 'LIKE', $states[18] . '%')->orwhere('state', 'LIKE', $states[19] . '%')->orwhere('state', 'LIKE', $states[20] . '%')->orwhere('state', 'LIKE', $states[21] . '%')->orwhere('state', 'LIKE', $states[22] . '%')->orwhere('state', 'LIKE', $states[23] . '%')->orwhere('state', 'LIKE', $states[24] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 26){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos" || $states[17] == "Todos" || $states[18] == "Todos" || $states[19] == "Todos" || $states[20] == "Todos" || $states[21] == "Todos" || $states[22] == "Todos" || $states[23] == "Todos" || $states[24] == "Todos" || $states[25] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orwhere('state', 'LIKE', $states[17] . '%')->orwhere('state', 'LIKE', $states[18] . '%')->orwhere('state', 'LIKE', $states[19] . '%')->orwhere('state', 'LIKE', $states[20] . '%')->orwhere('state', 'LIKE', $states[21] . '%')->orwhere('state', 'LIKE', $states[22] . '%')->orwhere('state', 'LIKE', $states[23] . '%')->orwhere('state', 'LIKE', $states[24] . '%')->orwhere('state', 'LIKE', $states[25] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            $states = \DB::table('organizations')->orderBy('state', 'ASC')->get('state');
            $states = $states->unique();
            return view('states', compact('organizations', 'states'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        }
    }

    public function order_sectors(Request $request)
    {
        try{
            $states = $request->order;
            $count = count($states);
            if($count == 1){
                if($states[0] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('type', 'LIKE', $states[0] . '%')->orderBy('type', 'ASC')->paginate(30);
                }   
            }
            else if($count == 2){
                if($states[0] == "Todos" || $states[1] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            else if($count == 3){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orwhere('type', 'LIKE', $states[2] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            else if($count == 4){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orwhere('type', 'LIKE', $states[2] . '%')->orwhere('type', 'LIKE', $states[3] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            else if($count == 5){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orwhere('type', 'LIKE', $states[2] . '%')->orwhere('type', 'LIKE', $states[3] . '%')->orwhere('type', 'LIKE', $states[4] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            else if($count == 6){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orwhere('type', 'LIKE', $states[2] . '%')->orwhere('type', 'LIKE', $states[3] . '%')->orwhere('type', 'LIKE', $states[4] . '%')->orwhere('type', 'LIKE', $states[5] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            else if($count == 7){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orwhere('type', 'LIKE', $states[2] . '%')->orwhere('type', 'LIKE', $states[3] . '%')->orwhere('type', 'LIKE', $states[4] . '%')->orwhere('type', 'LIKE', $states[5] . '%')->orwhere('type', 'LIKE', $states[6] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            else if($count == 8){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orwhere('type', 'LIKE', $states[2] . '%')->orwhere('type', 'LIKE', $states[3] . '%')->orwhere('type', 'LIKE', $states[4] . '%')->orwhere('type', 'LIKE', $states[5] . '%')->orwhere('type', 'LIKE', $states[6] . '%')->orwhere('type', 'LIKE', $states[7] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            else if($count == 9){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orwhere('type', 'LIKE', $states[2] . '%')->orwhere('type', 'LIKE', $states[3] . '%')->orwhere('type', 'LIKE', $states[4] . '%')->orwhere('type', 'LIKE', $states[5] . '%')->orwhere('type', 'LIKE', $states[6] . '%')->orwhere('type', 'LIKE', $states[7] . '%')->orwhere('type', 'LIKE', $states[8] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            else if($count == 10){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orwhere('type', 'LIKE', $states[2] . '%')->orwhere('type', 'LIKE', $states[3] . '%')->orwhere('type', 'LIKE', $states[4] . '%')->orwhere('type', 'LIKE', $states[5] . '%')->orwhere('type', 'LIKE', $states[6] . '%')->orwhere('type', 'LIKE', $states[7] . '%')->orwhere('type', 'LIKE', $states[8] . '%')->orwhere('type', 'LIKE', $states[9] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            else if($count == 11){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orwhere('type', 'LIKE', $states[2] . '%')->orwhere('type', 'LIKE', $states[3] . '%')->orwhere('type', 'LIKE', $states[4] . '%')->orwhere('type', 'LIKE', $states[5] . '%')->orwhere('type', 'LIKE', $states[6] . '%')->orwhere('type', 'LIKE', $states[7] . '%')->orwhere('type', 'LIKE', $states[8] . '%')->orwhere('type', 'LIKE', $states[9] . '%')->orwhere('type', 'LIKE', $states[10] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            else if($count == 12){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orwhere('type', 'LIKE', $states[2] . '%')->orwhere('type', 'LIKE', $states[3] . '%')->orwhere('type', 'LIKE', $states[4] . '%')->orwhere('type', 'LIKE', $states[5] . '%')->orwhere('type', 'LIKE', $states[6] . '%')->orwhere('type', 'LIKE', $states[7] . '%')->orwhere('type', 'LIKE', $states[8] . '%')->orwhere('type', 'LIKE', $states[9] . '%')->orwhere('type', 'LIKE', $states[10] . '%')->orwhere('type', 'LIKE', $states[11] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            else if($count == 13){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orwhere('type', 'LIKE', $states[2] . '%')->orwhere('type', 'LIKE', $states[3] . '%')->orwhere('type', 'LIKE', $states[4] . '%')->orwhere('type', 'LIKE', $states[5] . '%')->orwhere('type', 'LIKE', $states[6] . '%')->orwhere('type', 'LIKE', $states[7] . '%')->orwhere('type', 'LIKE', $states[8] . '%')->orwhere('type', 'LIKE', $states[9] . '%')->orwhere('type', 'LIKE', $states[10] . '%')->orwhere('type', 'LIKE', $states[11] . '%')->orwhere('type', 'LIKE', $states[12] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            else if($count == 14){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orwhere('type', 'LIKE', $states[2] . '%')->orwhere('type', 'LIKE', $states[3] . '%')->orwhere('type', 'LIKE', $states[4] . '%')->orwhere('type', 'LIKE', $states[5] . '%')->orwhere('type', 'LIKE', $states[6] . '%')->orwhere('type', 'LIKE', $states[7] . '%')->orwhere('type', 'LIKE', $states[8] . '%')->orwhere('type', 'LIKE', $states[9] . '%')->orwhere('type', 'LIKE', $states[10] . '%')->orwhere('type', 'LIKE', $states[11] . '%')->orwhere('type', 'LIKE', $states[12] . '%')->orwhere('type', 'LIKE', $states[13] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            else if($count == 15){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orwhere('type', 'LIKE', $states[2] . '%')->orwhere('type', 'LIKE', $states[3] . '%')->orwhere('type', 'LIKE', $states[4] . '%')->orwhere('type', 'LIKE', $states[5] . '%')->orwhere('type', 'LIKE', $states[6] . '%')->orwhere('type', 'LIKE', $states[7] . '%')->orwhere('type', 'LIKE', $states[8] . '%')->orwhere('type', 'LIKE', $states[9] . '%')->orwhere('type', 'LIKE', $states[10] . '%')->orwhere('type', 'LIKE', $states[11] . '%')->orwhere('type', 'LIKE', $states[12] . '%')->orwhere('type', 'LIKE', $states[13] . '%')->orwhere('type', 'LIKE', $states[14] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            else if($count == 16){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos"){
                    $organizations = \DB::table('organizations')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $organizations = \DB::table('organizations')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orwhere('type', 'LIKE', $states[2] . '%')->orwhere('type', 'LIKE', $states[3] . '%')->orwhere('type', 'LIKE', $states[4] . '%')->orwhere('type', 'LIKE', $states[5] . '%')->orwhere('type', 'LIKE', $states[6] . '%')->orwhere('type', 'LIKE', $states[7] . '%')->orwhere('type', 'LIKE', $states[8] . '%')->orwhere('type', 'LIKE', $states[9] . '%')->orwhere('type', 'LIKE', $states[10] . '%')->orwhere('type', 'LIKE', $states[11] . '%')->orwhere('type', 'LIKE', $states[12] . '%')->orwhere('type', 'LIKE', $states[13] . '%')->orwhere('type', 'LIKE', $states[14] . '%')->orwhere('type', 'LIKE', $states[15] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            $sectors = \DB::table('organizations')->orderBy('type', 'ASC')->get('type');
            $sectors = $sectors->unique();
            return view('sectors', compact('organizations', 'sectors'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        }
    }

    public function order_gstates(Request $request)
    {
        try{
            $states = $request->order;
            $count = count($states);
            if($count == 1){
                if($states[0] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('state', 'LIKE', $states[0] . '%')->orderBy('state', 'ASC')->paginate(30);
                }   
            }
            else if($count == 2){
                if($states[0] == "Todos" || $states[1] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 3){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 4){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 5){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 6){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 7){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 8){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 9){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 10){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 11){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 12){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 13){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 14){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 15){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 16){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 17){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 18){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos" || $states[17] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orwhere('state', 'LIKE', $states[17] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 19){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos" || $states[17] == "Todos" || $states[18] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orwhere('state', 'LIKE', $states[17] . '%')->orwhere('state', 'LIKE', $states[18] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 20){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos" || $states[17] == "Todos" || $states[18] == "Todos" || $states[19] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orwhere('state', 'LIKE', $states[17] . '%')->orwhere('state', 'LIKE', $states[18] . '%')->orwhere('state', 'LIKE', $states[19] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 21){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos" || $states[17] == "Todos" || $states[18] == "Todos" || $states[19] == "Todos" || $states[20] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orwhere('state', 'LIKE', $states[17] . '%')->orwhere('state', 'LIKE', $states[18] . '%')->orwhere('state', 'LIKE', $states[19] . '%')->orwhere('state', 'LIKE', $states[20] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 22){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos" || $states[17] == "Todos" || $states[18] == "Todos" || $states[19] == "Todos" || $states[20] == "Todos" || $states[21] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orwhere('state', 'LIKE', $states[17] . '%')->orwhere('state', 'LIKE', $states[18] . '%')->orwhere('state', 'LIKE', $states[19] . '%')->orwhere('state', 'LIKE', $states[20] . '%')->orwhere('state', 'LIKE', $states[21] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 23){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos" || $states[17] == "Todos" || $states[18] == "Todos" || $states[19] == "Todos" || $states[20] == "Todos" || $states[21] == "Todos" || $states[22] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orwhere('state', 'LIKE', $states[17] . '%')->orwhere('state', 'LIKE', $states[18] . '%')->orwhere('state', 'LIKE', $states[19] . '%')->orwhere('state', 'LIKE', $states[20] . '%')->orwhere('state', 'LIKE', $states[21] . '%')->orwhere('state', 'LIKE', $states[22] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 24){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos" || $states[17] == "Todos" || $states[18] == "Todos" || $states[19] == "Todos" || $states[20] == "Todos" || $states[21] == "Todos" || $states[22] == "Todos" || $states[23] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orwhere('state', 'LIKE', $states[17] . '%')->orwhere('state', 'LIKE', $states[18] . '%')->orwhere('state', 'LIKE', $states[19] . '%')->orwhere('state', 'LIKE', $states[20] . '%')->orwhere('state', 'LIKE', $states[21] . '%')->orwhere('state', 'LIKE', $states[22] . '%')->orwhere('state', 'LIKE', $states[23] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 25){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos" || $states[17] == "Todos" || $states[18] == "Todos" || $states[19] == "Todos" || $states[20] == "Todos" || $states[21] == "Todos" || $states[22] == "Todos" || $states[23] == "Todos" || $states[24] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orwhere('state', 'LIKE', $states[17] . '%')->orwhere('state', 'LIKE', $states[18] . '%')->orwhere('state', 'LIKE', $states[19] . '%')->orwhere('state', 'LIKE', $states[20] . '%')->orwhere('state', 'LIKE', $states[21] . '%')->orwhere('state', 'LIKE', $states[22] . '%')->orwhere('state', 'LIKE', $states[23] . '%')->orwhere('state', 'LIKE', $states[24] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 26){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos" || $states[17] == "Todos" || $states[18] == "Todos" || $states[19] == "Todos" || $states[20] == "Todos" || $states[21] == "Todos" || $states[22] == "Todos" || $states[23] == "Todos" || $states[24] == "Todos" || $states[25] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orwhere('state', 'LIKE', $states[17] . '%')->orwhere('state', 'LIKE', $states[18] . '%')->orwhere('state', 'LIKE', $states[19] . '%')->orwhere('state', 'LIKE', $states[20] . '%')->orwhere('state', 'LIKE', $states[21] . '%')->orwhere('state', 'LIKE', $states[22] . '%')->orwhere('state', 'LIKE', $states[23] . '%')->orwhere('state', 'LIKE', $states[24] . '%')->orwhere('state', 'LIKE', $states[25] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            $states = \DB::table('godparents')->orderBy('state', 'ASC')->get('state');
            $states = $states->unique();
            return view('gstates', compact('godparents', 'states'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        }
    }

    public function order_gsectors(Request $request)
    {
        try{
            $states = $request->order;
            $count = count($states);
            if($count == 1){
                if($states[0] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('type', 'LIKE', $states[0] . '%')->orderBy('type', 'ASC')->paginate(30);
                }   
            }
            else if($count == 2){
                if($states[0] == "Todos" || $states[1] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            else if($count == 3){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orwhere('type', 'LIKE', $states[2] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            else if($count == 4){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orwhere('type', 'LIKE', $states[2] . '%')->orwhere('type', 'LIKE', $states[3] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            else if($count == 5){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orwhere('type', 'LIKE', $states[2] . '%')->orwhere('type', 'LIKE', $states[3] . '%')->orwhere('type', 'LIKE', $states[4] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            else if($count == 6){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orwhere('type', 'LIKE', $states[2] . '%')->orwhere('type', 'LIKE', $states[3] . '%')->orwhere('type', 'LIKE', $states[4] . '%')->orwhere('type', 'LIKE', $states[5] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            else if($count == 7){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orwhere('type', 'LIKE', $states[2] . '%')->orwhere('type', 'LIKE', $states[3] . '%')->orwhere('type', 'LIKE', $states[4] . '%')->orwhere('type', 'LIKE', $states[5] . '%')->orwhere('type', 'LIKE', $states[6] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            else if($count == 8){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orwhere('type', 'LIKE', $states[2] . '%')->orwhere('type', 'LIKE', $states[3] . '%')->orwhere('type', 'LIKE', $states[4] . '%')->orwhere('type', 'LIKE', $states[5] . '%')->orwhere('type', 'LIKE', $states[6] . '%')->orwhere('type', 'LIKE', $states[7] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            else if($count == 9){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orwhere('type', 'LIKE', $states[2] . '%')->orwhere('type', 'LIKE', $states[3] . '%')->orwhere('type', 'LIKE', $states[4] . '%')->orwhere('type', 'LIKE', $states[5] . '%')->orwhere('type', 'LIKE', $states[6] . '%')->orwhere('type', 'LIKE', $states[7] . '%')->orwhere('type', 'LIKE', $states[8] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            else if($count == 10){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orwhere('type', 'LIKE', $states[2] . '%')->orwhere('type', 'LIKE', $states[3] . '%')->orwhere('type', 'LIKE', $states[4] . '%')->orwhere('type', 'LIKE', $states[5] . '%')->orwhere('type', 'LIKE', $states[6] . '%')->orwhere('type', 'LIKE', $states[7] . '%')->orwhere('type', 'LIKE', $states[8] . '%')->orwhere('type', 'LIKE', $states[9] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            else if($count == 11){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orwhere('type', 'LIKE', $states[2] . '%')->orwhere('type', 'LIKE', $states[3] . '%')->orwhere('type', 'LIKE', $states[4] . '%')->orwhere('type', 'LIKE', $states[5] . '%')->orwhere('type', 'LIKE', $states[6] . '%')->orwhere('type', 'LIKE', $states[7] . '%')->orwhere('type', 'LIKE', $states[8] . '%')->orwhere('type', 'LIKE', $states[9] . '%')->orwhere('type', 'LIKE', $states[10] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            else if($count == 12){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orwhere('type', 'LIKE', $states[2] . '%')->orwhere('type', 'LIKE', $states[3] . '%')->orwhere('type', 'LIKE', $states[4] . '%')->orwhere('type', 'LIKE', $states[5] . '%')->orwhere('type', 'LIKE', $states[6] . '%')->orwhere('type', 'LIKE', $states[7] . '%')->orwhere('type', 'LIKE', $states[8] . '%')->orwhere('type', 'LIKE', $states[9] . '%')->orwhere('type', 'LIKE', $states[10] . '%')->orwhere('type', 'LIKE', $states[11] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            else if($count == 13){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orwhere('type', 'LIKE', $states[2] . '%')->orwhere('type', 'LIKE', $states[3] . '%')->orwhere('type', 'LIKE', $states[4] . '%')->orwhere('type', 'LIKE', $states[5] . '%')->orwhere('type', 'LIKE', $states[6] . '%')->orwhere('type', 'LIKE', $states[7] . '%')->orwhere('type', 'LIKE', $states[8] . '%')->orwhere('type', 'LIKE', $states[9] . '%')->orwhere('type', 'LIKE', $states[10] . '%')->orwhere('type', 'LIKE', $states[11] . '%')->orwhere('type', 'LIKE', $states[12] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            else if($count == 14){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orwhere('type', 'LIKE', $states[2] . '%')->orwhere('type', 'LIKE', $states[3] . '%')->orwhere('type', 'LIKE', $states[4] . '%')->orwhere('type', 'LIKE', $states[5] . '%')->orwhere('type', 'LIKE', $states[6] . '%')->orwhere('type', 'LIKE', $states[7] . '%')->orwhere('type', 'LIKE', $states[8] . '%')->orwhere('type', 'LIKE', $states[9] . '%')->orwhere('type', 'LIKE', $states[10] . '%')->orwhere('type', 'LIKE', $states[11] . '%')->orwhere('type', 'LIKE', $states[12] . '%')->orwhere('type', 'LIKE', $states[13] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            else if($count == 15){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orwhere('type', 'LIKE', $states[2] . '%')->orwhere('type', 'LIKE', $states[3] . '%')->orwhere('type', 'LIKE', $states[4] . '%')->orwhere('type', 'LIKE', $states[5] . '%')->orwhere('type', 'LIKE', $states[6] . '%')->orwhere('type', 'LIKE', $states[7] . '%')->orwhere('type', 'LIKE', $states[8] . '%')->orwhere('type', 'LIKE', $states[9] . '%')->orwhere('type', 'LIKE', $states[10] . '%')->orwhere('type', 'LIKE', $states[11] . '%')->orwhere('type', 'LIKE', $states[12] . '%')->orwhere('type', 'LIKE', $states[13] . '%')->orwhere('type', 'LIKE', $states[14] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            else if($count == 16){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos"){
                    $godparents = \DB::table('godparents')->orderBy('type', 'ASC')->paginate(30);
                }
                else{
                    $godparents = \DB::table('godparents')->where('type', 'LIKE', $states[0] . '%')->orwhere('type', 'LIKE', $states[1] . '%')->orwhere('type', 'LIKE', $states[2] . '%')->orwhere('type', 'LIKE', $states[3] . '%')->orwhere('type', 'LIKE', $states[4] . '%')->orwhere('type', 'LIKE', $states[5] . '%')->orwhere('type', 'LIKE', $states[6] . '%')->orwhere('type', 'LIKE', $states[7] . '%')->orwhere('type', 'LIKE', $states[8] . '%')->orwhere('type', 'LIKE', $states[9] . '%')->orwhere('type', 'LIKE', $states[10] . '%')->orwhere('type', 'LIKE', $states[11] . '%')->orwhere('type', 'LIKE', $states[12] . '%')->orwhere('type', 'LIKE', $states[13] . '%')->orwhere('type', 'LIKE', $states[14] . '%')->orwhere('type', 'LIKE', $states[15] . '%')->orderBy('type', 'ASC')->paginate(30);
                }  
            }
            $sectors = \DB::table('godparents')->orderBy('type', 'ASC')->get('type');
            $sectors = $sectors->unique();
            return view('gsectors', compact('godparents', 'sectors'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        }
    }

    public function order_actions(Request $request)
    {
        try{
            $states = $request->order;
            $count = count($states);
            if($count == 1){
                if($states[0] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('name', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('mandatories', 'LIKE', '%' . $states[0] . '%')->orderBy('mandatories', 'ASC')->paginate(30);
                }   
            }
            else if($count == 2){
                if($states[0] == "Todos" || $states[1] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('name', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('mandatories', 'LIKE', '%' . $states[0] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[1] . '%')->orderBy('mandatories', 'ASC')->paginate(30);
                }  
            }
            else if($count == 3){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('name', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('mandatories', 'LIKE', '%' . $states[0] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[1] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[2] . '%')->orderBy('mandatories', 'ASC')->paginate(30);
                }  
            }
            else if($count == 4){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('name', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('mandatories', 'LIKE', '%' . $states[0] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[1] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[2] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[3] . '%')->orderBy('mandatories', 'ASC')->paginate(30);
                }  
            }
            else if($count == 5){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('name', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('mandatories', 'LIKE', '%' . $states[0] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[1] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[2] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[3] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[4] . '%')->orderBy('mandatories', 'ASC')->paginate(30);
                }  
            }
            else if($count == 6){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('name', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('mandatories', 'LIKE', '%' . $states[0] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[1] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[2] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[3] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[4] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[5] . '%')->orderBy('mandatories', 'ASC')->paginate(30);
                }  
            }
            else if($count == 7){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('name', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('mandatories', 'LIKE', '%' . $states[0] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[1] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[2] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[3] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[4] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[5] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[6] . '%')->orderBy('mandatories', 'ASC')->paginate(30);
                }  
            }
            else if($count == 8){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('name', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('mandatories', 'LIKE', '%' . $states[0] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[1] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[2] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[3] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[4] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[5] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[6] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[7] . '%')->orderBy('mandatories', 'ASC')->paginate(30);
                }  
            }
            else if($count == 9){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('name', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('mandatories', 'LIKE', '%' . $states[0] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[1] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[2] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[3] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[4] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[5] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[6] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[7] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[8] . '%')->orderBy('mandatories', 'ASC')->paginate(30);
                }  
            }
            else if($count == 10){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('name', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('mandatories', 'LIKE', '%' . $states[0] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[1] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[2] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[3] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[4] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[5] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[6] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[7] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[8] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[9] . '%')->orderBy('mandatories', 'ASC')->paginate(30);
                }  
            }
            else if($count == 11){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('name', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('mandatories', 'LIKE', '%' . $states[0] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[1] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[2] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[3] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[4] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[5] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[6] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[7] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[8] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[9] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[10] . '%')->orderBy('mandatories', 'ASC')->paginate(30);
                }  
            }
            else if($count == 12){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('name', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('mandatories', 'LIKE', '%' . $states[0] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[1] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[2] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[3] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[4] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[5] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[6] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[7] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[8] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[9] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[10] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[11] . '%')->orderBy('mandatories', 'ASC')->paginate(30);
                }  
            }
            else if($count == 13){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('name', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('mandatories', 'LIKE', '%' . $states[0] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[1] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[2] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[3] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[4] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[5] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[6] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[7] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[8] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[9] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[10] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[11] . '%')->orwhere('mandatories', 'LIKE', '%' . $states[12] . '%')->orderBy('mandatories', 'ASC')->paginate(30);
                }  
            }
            $inis = \DB::table('initiatives')->orderBy('name', 'ASC')->paginate(30);
            $actions = \DB::table('actions')->get();
            $orgaini = \DB::table('orga-ini')->get();
            $organizations = \DB::table('organizations')->get();
            return view('actions', compact('initiatives', 'actions', 'organizations', 'orgaini', 'inis'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        }
    }
    
    public function order_istates(Request $request)
    {
        try{
            $states = $request->order;
            $count = count($states);
            if($count == 1){
                if($states[0] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('state', 'LIKE', $states[0] . '%')->orderBy('state', 'ASC')->paginate(30);
                }   
            }
            else if($count == 2){
                if($states[0] == "Todos" || $states[1] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 3){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 4){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 5){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 6){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 7){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 8){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 9){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 10){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 11){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 12){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 13){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 14){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 15){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 16){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 17){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 18){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos" || $states[17] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orwhere('state', 'LIKE', $states[17] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 19){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos" || $states[17] == "Todos" || $states[18] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orwhere('state', 'LIKE', $states[17] . '%')->orwhere('state', 'LIKE', $states[18] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 20){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos" || $states[17] == "Todos" || $states[18] == "Todos" || $states[19] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orwhere('state', 'LIKE', $states[17] . '%')->orwhere('state', 'LIKE', $states[18] . '%')->orwhere('state', 'LIKE', $states[19] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 21){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos" || $states[17] == "Todos" || $states[18] == "Todos" || $states[19] == "Todos" || $states[20] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orwhere('state', 'LIKE', $states[17] . '%')->orwhere('state', 'LIKE', $states[18] . '%')->orwhere('state', 'LIKE', $states[19] . '%')->orwhere('state', 'LIKE', $states[20] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 22){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos" || $states[17] == "Todos" || $states[18] == "Todos" || $states[19] == "Todos" || $states[20] == "Todos" || $states[21] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orwhere('state', 'LIKE', $states[17] . '%')->orwhere('state', 'LIKE', $states[18] . '%')->orwhere('state', 'LIKE', $states[19] . '%')->orwhere('state', 'LIKE', $states[20] . '%')->orwhere('state', 'LIKE', $states[21] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 23){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos" || $states[17] == "Todos" || $states[18] == "Todos" || $states[19] == "Todos" || $states[20] == "Todos" || $states[21] == "Todos" || $states[22] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orwhere('state', 'LIKE', $states[17] . '%')->orwhere('state', 'LIKE', $states[18] . '%')->orwhere('state', 'LIKE', $states[19] . '%')->orwhere('state', 'LIKE', $states[20] . '%')->orwhere('state', 'LIKE', $states[21] . '%')->orwhere('state', 'LIKE', $states[22] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 24){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos" || $states[17] == "Todos" || $states[18] == "Todos" || $states[19] == "Todos" || $states[20] == "Todos" || $states[21] == "Todos" || $states[22] == "Todos" || $states[23] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orwhere('state', 'LIKE', $states[17] . '%')->orwhere('state', 'LIKE', $states[18] . '%')->orwhere('state', 'LIKE', $states[19] . '%')->orwhere('state', 'LIKE', $states[20] . '%')->orwhere('state', 'LIKE', $states[21] . '%')->orwhere('state', 'LIKE', $states[22] . '%')->orwhere('state', 'LIKE', $states[23] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 25){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos" || $states[17] == "Todos" || $states[18] == "Todos" || $states[19] == "Todos" || $states[20] == "Todos" || $states[21] == "Todos" || $states[22] == "Todos" || $states[23] == "Todos" || $states[24] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orwhere('state', 'LIKE', $states[17] . '%')->orwhere('state', 'LIKE', $states[18] . '%')->orwhere('state', 'LIKE', $states[19] . '%')->orwhere('state', 'LIKE', $states[20] . '%')->orwhere('state', 'LIKE', $states[21] . '%')->orwhere('state', 'LIKE', $states[22] . '%')->orwhere('state', 'LIKE', $states[23] . '%')->orwhere('state', 'LIKE', $states[24] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            else if($count == 26){
                if($states[0] == "Todos" || $states[1] == "Todos" || $states[2] == "Todos" || $states[3] == "Todos" || $states[4] == "Todos" || $states[5] == "Todos" || $states[6] == "Todos" || $states[7] == "Todos" || $states[8] == "Todos" || $states[9] == "Todos" || $states[10] == "Todos" || $states[11] == "Todos" || $states[12] == "Todos" || $states[13] == "Todos" || $states[14] == "Todos" || $states[15] == "Todos" || $states[16] == "Todos" || $states[17] == "Todos" || $states[18] == "Todos" || $states[19] == "Todos" || $states[20] == "Todos" || $states[21] == "Todos" || $states[22] == "Todos" || $states[23] == "Todos" || $states[24] == "Todos" || $states[25] == "Todos"){
                    $initiatives = \DB::table('initiatives')->orderBy('state', 'ASC')->paginate(30);
                }
                else{
                    $initiatives = \DB::table('initiatives')->where('state', 'LIKE', $states[0] . '%')->orwhere('state', 'LIKE', $states[1] . '%')->orwhere('state', 'LIKE', $states[2] . '%')->orwhere('state', 'LIKE', $states[3] . '%')->orwhere('state', 'LIKE', $states[4] . '%')->orwhere('state', 'LIKE', $states[5] . '%')->orwhere('state', 'LIKE', $states[6] . '%')->orwhere('state', 'LIKE', $states[7] . '%')->orwhere('state', 'LIKE', $states[8] . '%')->orwhere('state', 'LIKE', $states[9] . '%')->orwhere('state', 'LIKE', $states[10] . '%')->orwhere('state', 'LIKE', $states[11] . '%')->orwhere('state', 'LIKE', $states[12] . '%')->orwhere('state', 'LIKE', $states[13] . '%')->orwhere('state', 'LIKE', $states[14] . '%')->orwhere('state', 'LIKE', $states[15] . '%')->orwhere('state', 'LIKE', $states[16] . '%')->orwhere('state', 'LIKE', $states[17] . '%')->orwhere('state', 'LIKE', $states[18] . '%')->orwhere('state', 'LIKE', $states[19] . '%')->orwhere('state', 'LIKE', $states[20] . '%')->orwhere('state', 'LIKE', $states[21] . '%')->orwhere('state', 'LIKE', $states[22] . '%')->orwhere('state', 'LIKE', $states[23] . '%')->orwhere('state', 'LIKE', $states[24] . '%')->orwhere('state', 'LIKE', $states[25] . '%')->orderBy('state', 'ASC')->paginate(30);
                }  
            }
            $states = \DB::table('initiatives')->orderBy('state', 'ASC')->get('state');
            $states = $states->unique();
            return view('istates', compact('initiatives', 'states'));
        }catch(Exception $ex){
            $mensaje = "Recuerde estar logueado para poder ver y realizar acciones correctamente. Verifique la conexión a internet. Intente nuevamenten más tarde.";
            return view('error', compact('mensaje'));
        }
    }
}