<?php
namespace App\Http\Traits;



trait GeneralTrait
{
    //data to update
    public function updateAutofill($alldata){
        $data = $alldata['software_field_master_id'];
//        $data = $alldata['client_master_id'];
        $swMstrId = $alldata['swMstrId'];
        
        if($swMstrId == 1){ // kareo
    //Insurance  AR Information
            $data[5]=round($data[5],2);
            $data[7]=round($data[7],2);
            $data[9]=round($data[9],2);
            $data[11]=round($data[11],2);
            $data[13]=round($data[13],2);
            $data[15]=round($data[15],2);
            //total
            $data[17]=$data[5]+$data[7]+$data[9]+$data[11]+$data[13]+$data[15];
            //0-30 %
    //        $data[8] = round($data[7]/$data[17]*100,2);
            if($data[17]>0){
                $data[8] = round($data[7]/$data[17]*100,2);
                //30-60 %round(`
                $data[10] =round($data[9]/$data[17]*100,2);
                //60-90 %round(
                $data[12] =round($data[11]/$data[17]*100,2);
                //90-120 %round(
                $data[14] =round($data[13]/$data[17]*100,2);
                //>120 %round(
                $data[16] =round($data[15]/$data[17]*100,2);
                
                
                //unbilled amount %
                $data[6] =round($data[5]/$data[17]*100,2);
                
//                $data[18] =round($data[6]+$data[8]+$data[10]+$data[12]+$data[14]+$data[16],2);
                $data[18] =100.00;//round($data[6]+$data[8]+$data[10]+$data[12]+$data[14]+$data[16],2);
            } else {
                $data[8] = round(0,2);
                //30-60 %round(`
                $data[10] =round(0,2);
                //60-90 %round(
                $data[12] =round(0,2);
                //90-120 %round(
                $data[14] =round(0,2);
                //90-120 %round(
                $data[16] =round(0,2);
                //unbilled amount %
                $data[6] =round(0,2);
                
                $data[18] =round(0,2);
            }



    //Patient AR Information
            $data[19]=round($data[19],2);
            $data[21]=round($data[21],2);
            $data[23]=round($data[23],2);
            $data[25]=round($data[25],2);
            $data[27]=round($data[27],2);
            $data[29]=round($data[29],2);
            //total
            $data[31]=$data[19]+$data[21]+$data[23]+$data[25]+$data[27]+$data[29];
            //0-30 %
            if($data[31]>0){
                //$data[8] = round($data[7]/$data[17]*100,2);
                $data[22] = round($data[21]/$data[31]*100,2);
                //30-60 %round(`
                $data[24] =round($data[23]/$data[31]*100,2);
                //60-90 %round(
                $data[26] =round($data[25]/$data[31]*100,2);
                //90-120 %round(
                $data[28] =round($data[27]/$data[31]*100,2);
                //unbilled amount %
                $data[20] =round($data[19]/$data[31]*100,2);
                //unbilled amount %
                $data[30] =round($data[29]/$data[31]*100,2);
                
//                $data[32] = round($data[22]+$data[24]+$data[26]+$data[28]+$data[20]+$data[30],2);
                $data[32] =100.00;//round($data[22]+$data[24]+$data[26]+$data[28]+$data[20]+$data[30],2);
            } else {
                //$data[8] = round($data[7]/$data[17]*100,2);
                $data[22] = round(0,2);
                //30-60 %round(`
                $data[24] =round(0,2);
                //60-90 %round(
                $data[26] =round(0,2);
                //90-120 %round(
                $data[28] =round(0,2);
                //unbilled amount %
                $data[20] =round(0,2);
            }
            $data[40]=$data[38]+$data[39]; //Daily Collection Details	
    //Insurance + Patient AR Total
            $data[33]=round($data[7]+$data[21],2);
            $data[34]=round($data[9]+$data[23],2);
            $data[35]=round($data[11]+$data[25],2);
            $data[36]=round($data[13]+$data[27],2);
            $data[37]=round($data[15]+$data[29],2);
        } else if($swMstrId == 3){ // athina
            //Insurance  AR Information
//            $data[5] = 0;
//            $data[5]=round($data[5],2);
            
            $data[91]=round($data[91],2);
            $data[93]=round($data[93],2);
            $data[95]=round($data[95],2);
            $data[97]=round($data[97],2);
            $data[99]=round($data[99],2);
            //total
//            $data[17]=$data[5]+$data[7]+$data[9]+$data[11]+$data[13]+$data[15];
            $data[101]=$data[91]+$data[93]+$data[95]+$data[97]+$data[99];
            //0-30 %
    //        $data[8] = round($data[7]/$data[17]*100,2);
            if($data[101]>0){
                $data[92] = round($data[91]/$data[101]*100,2);
                //30-60 %round(`
                $data[94] =round($data[93]/$data[101]*100,2);
                //60-90 %round(
                $data[96] =round($data[95]/$data[101]*100,2);
                //90-120 %round(
                $data[98] =round($data[97]/$data[101]*100,2);
                //unbilled amount %
                $data[100] =round($data[99]/$data[101]*100,2);
                //total %
//                $data[102] =round($data[92]+$data[94]+$data[96]+$data[98]+$data[100],2);
                $data[102] =100.00;//round($data[92]+$data[94]+$data[96]+$data[98]+$data[100],2);
            } else {
                $data[92] = round(0,2);
                //30-60 %round(`
                $data[94] =round(0,2);
                //60-90 %round(
                $data[96] =round(0,2);
                //90-120 %round(
                $data[98] =round(0,2);
                //unbilled amount %
                $data[100] =round(0,2);
                //total %
                $data[102] =round(0,2);
            }



    //Patient AR Information
//            $data[19] = 13135.45;
//            $data[19]=round($data[19],2);
            $data[103]=round($data[103],2);
            $data[105]=round($data[105],2);
            $data[107]=round($data[107],2);
            $data[109]=round($data[109],2);
            $data[111]=round($data[111],2);
            //total
            $data[113]=$data[103]+$data[105]+$data[107]+$data[109]+$data[111];
            //0-30 %
            if($data[113]>0){
                //$data[8] = round($data[7]/$data[17]*100,2);
                $data[104] = round($data[103]/$data[113]*100,2);
                //30-60 %round(`
                $data[106] =round($data[105]/$data[113]*100,2);
                //60-90 %round(
                $data[108] =round($data[107]/$data[113]*100,2);
                //90-120 %round(
                $data[110] =round($data[109]/$data[113]*100,2);
                //unbilled amount %
                $data[112] =round($data[111]/$data[113]*100,2);
                //total
                $data[114] =round($data[104]+$data[106]+$data[108]+$data[110]+$data[112],2);
                $data[114] =100.00;//round($data[104]+$data[106]+$data[108]+$data[110]+$data[112],2);
                
            } else {
                //$data[8] = round($data[7]/$data[17]*100,2);
                $data[104] = round(0,2);
                //30-60 %round(`
                $data[106] =round(0,2);
                //60-90 %round(
                $data[108] =round(0,2);
                //90-120 %round(
                $data[110] =round(0,2);
                //unbilled amount %
                $data[112] =round(0,2);
                //total
                $data[113] =round(0,2);
            }
    //Insurance + Patient AR Total
            $data[122]=round($data[120]+$data[121],2); //Daily Collection Details	
            $data[115]=round($data[91]+$data[103],2);
            $data[116]=round($data[93]+$data[105],2);
            $data[117]=round($data[95]+$data[107],2);
            $data[118]=round($data[97]+$data[109],2);
            $data[119]=round($data[99]+$data[111],2);
        }else if($swMstrId == 2){ // ecw
            //Insurance  AR Information
//            $data[5] = 0;
//            $data[5]=round($data[5],2);
            
            $data[46]=round($data[46],2);
            $data[48]=round($data[48],2);
            $data[50]=round($data[50],2);
            $data[52]=round($data[52],2);
            $data[54]=round($data[54],2);
            $data[56]=round($data[56],2);
            $data[58]=round($data[58],2);
            
            
           $data[60]=
            $data[46]+
            $data[48]+
            $data[50]+
            $data[52]+
            $data[54]+
            $data[56]+
            $data[58];
            
            
            //total
            //0-30 %
    //        $data[8] = round($data[7]/$data[17]*100,2);
            if($data[60]>0){
                $data[47] = round($data[46]/$data[60]*100,2);
                $data[49] = round($data[48]/$data[60]*100,2);
                $data[51] = round($data[50]/$data[60]*100,2);
                $data[53] = round($data[52]/$data[60]*100,2);
                $data[55] =round($data[54]/$data[60]*100,2);
                $data[57] =round($data[56]/$data[60]*100,2);
                $data[59] =round($data[58]/$data[60]*100,2);
                //total %
//                $data[61] =round($data[47]+$data[49]+$data[51]+$data[53]+$data[55]+$data[57]+$data[59],2);
                $data[61] =100.00;//round($data[47]+$data[49]+$data[51]+$data[53]+$data[55]+$data[57]+$data[59],2);
            } else {
                $data[47] =round(0,2);
                //30-60 %ro
                $data[49] =round(0,2);
                //60-90 %ro
                $data[51] =round(0,2);
                //90-120 %r
                $data[53] =round(0,2);
                //unbilled 
                $data[55] =round(0,2);
                
                $data[57] =round(0,2);
                
                $data[59] =round(0,2);
                //total %
                $data[61] =round(0,2);
            }



    //Patient AR Information
//            $data[19] = 13135.45;
//            $data[19]=round($data[19],2);
            $data[62]=round($data[62],2);
            $data[64]=round($data[64],2);
            $data[66]=round($data[66],2);
            $data[68]=round($data[68],2);
            $data[70]=round($data[70],2);
            $data[72]=round($data[72],2);
            $data[74]=round($data[74],2);
            //total
            $data[76]=$data[62]+$data[64]+$data[66]+$data[68]+$data[70]+$data[72]+$data[74];
            //0-30 %
            if($data[76]>0){
                //$data[8] = round($data[7]/$data[17]*100,2);
                $data[63] =round($data[62]/$data[76]*100,2);
                $data[65] =round($data[64]/$data[76]*100,2);
                $data[67] =round($data[66]/$data[76]*100,2);
                $data[69] =round($data[68]/$data[76]*100,2);
                $data[71] =round($data[70]/$data[76]*100,2);
                $data[73] =round($data[72]/$data[76]*100,2);
                $data[75] =round($data[74]/$data[76]*100,2);
//                $data[77] =round($data[63]+$data[65]+$data[67]+$data[69]+$data[71]+$data[73]+$data[75],2);
                $data[77] =100.00;//round($data[63]+$data[65]+$data[67]+$data[69]+$data[71]+$data[73]+$data[75],2);
                
            } else {
                
                $data[63] =round(0,2);
                $data[65] =round(0,2);
                $data[67] =round(0,2);
                $data[69] =round(0,2);
                $data[71] =round(0,2);
                $data[73] =round(0,2);
                $data[75] =round(0,2);
                $data[77] =round(0,2);
            }
            
            $data[87]=$data[86]+$data[85]; //Daily Collection Details	
            
    //Insurance + Patient AR Total
            $data[78]=round($data[46]+$data[62],2);
            $data[79]=round($data[48]+$data[64],2);
            $data[80]=round($data[50]+$data[66],2);
            $data[81]=round($data[52]+$data[68],2);
            $data[82]=round($data[54]+$data[70],2);
            $data[83]=round($data[56]+$data[72],2);
            $data[84]=round($data[58]+$data[74],2);
        }
            return $data;
    }
}
/* Dont add more lines here... Add into GeneralTrait2. no need to use GeneralTrait2 in controller just use GeneralTrait and its already there.
*/

?>