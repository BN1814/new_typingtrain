<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exercise;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $exercise = [
            // แถว a-;
            [
                'level' => '01',
                'level_name' => 'f & j',
                'data_level' => 'ffff jjjj ffff jjjj fjfj fjfj fjfj fjfj ffjj jjff ffjj jjff fffj jjjf fjjf jffj fjjf jffj fjjf jffj fjjf jffj',
            ],
            [
                'level' => '02',
                'level_name' => 'd & k',
                'data_level' => 'dddd kkkk dddd kkkk dkdk dkdk dkdk dkdk ddkk kkdd ddkk kkdd dddk kkkd dkkd kddk dkkd kddk dkkd kddk dkkd kddk',
            ],
            [
                'level' => '03',
                'level_name' => 's & l',
                'data_level' => 'ssss llll ssss llll slsl slsl slsl slsl ssll llss ssll llss sssl llls slls lssl slls lssl slls lssl slls lssl',
            ],
            [
                'level' => '04',
                'level_name' => 'a & ;',
                'data_level' => 'aaaa ;;;; aaaa ;;;; a;a; a;a; a;a; a;a; aa;; ;;aa aa;; ;;aa aaa; ;;;a a;;a ;aa; a;;a ;aa; a;;a ;aa; a;;a ;aa;',
            ],
            [
                'level' => '05',
                'level_name' => 'g & h',
                'data_level' => 'gggg hhhh gggg hhhh ghgh ghgh ghgh ghgh gghh gghh hhgg hhgg gggh hhhg ghhg hggh ghhg hggh ghhg hggh ghhg hggh',
            ],
            [
                'level' => '06',
                'level_name' => 'mix 01-05',
                'data_level' => 'asdfg hjkl; asdfg hjkl; ;lkjh gfdsa ;lkjh gfdsa aass ddff jjkk ll;; fghj fghj jhgf jhgf asdkl; asdkl; ;lkdsa ;lkdsa',
            ],
            [
                'level' => '07',
                'level_name' => 'mix test 01',
                'data_level' => 'author soldier flexible jetlag different financial score airport dentist however firework decoration govenment history',
            ],
            
            // แถว q-]
            [
                'level' => '08',
                'level_name' => 'y & u',
                'data_level' => 'yyyy uuuu yyyy uuuu yuyu yuyu yuyu yuyu yyuu yyuu uuyy uuyy yyyu uuuy yuuy uyyu yuuy uyyu yuuy uyyu yuuy uyyu',
            ],
            [
                'level' => '09',
                'level_name' => 't & i',
                'data_level' => 'tttt iiii tttt iiii titi titi titi titi ttii ttii iitt iitt ttti iiit tiit itti tiit itti tiit itti tiit itti',
            ],
            [
                'level' => '10',
                'level_name' => 'r & o',
                'data_level' => 'rrrr oooo rrrr oooo roro roro roro roro rroo rroo oorr oorr rrro ooor roor orro roor orro roor orro roor orro',
            ],
            [
                'level' => '11',
                'level_name' => 'e & p',
                'data_level' => 'eeee pppp eeee pppp epep epep epep epep eepp eepp ppee ppee eeep pppe eppe peep eppe peep eppe peep eppe peep',
            ],
            [
                'level' => '12',
                'level_name' => 'w & [',
                'data_level' => 'wwww [[[[ wwww [[[[ w[w[ w[w[ w[w[ w[w[ www[ www[ [[[w [[[w ww[[ [[ww w[[w [ww[ w[[w [ww[ w[[w [ww[ w[[w [ww[',
            ],
            [
                'level' => '13',
                'level_name' => 'q & ]',
                'data_level' => 'qqqq ]]]] qqqq ]]]] q]q] q]q] q]q] q]q] qqq] qqq] ]]]q ]]]q qq]] ]]qq q]]q ]qq] q]]q ]qq] q]]q ]qq] q]]q ]qq]',
            ],
            [
                'level' => '14',
                'level_name' => 'mix 08-13',
                'data_level' => 'qwerty uiop[] quwi quwi eorp erop [erty] [erty] [uiop [uiop] qqww eerr ttyy uuii oopp',
            ],
            [
                'level' => '15',
                'level_name' => 'mix test 02',
                'data_level' => 'ribbon palace opposite passport reason rich quiz engineer import period reporter yellow electronic translator',
            ],
            // แถว z-m
            [
                'level' => '16',
                'level_name' => 'b & n',
                'data_level' => 'bbbb nnnn bnbn bnbn nnnn bbbb nbnb nbnb bbbn bbbn nbbb nbbb nbbn bnnb nbbn bnnb nbbn bnnb nbbn bnnb bbbb nnnn',
            ],
            [
                'level' => '17',
                'level_name' => 'v & m',
                'data_level' => 'vvvv mmmm vmvm vmvm mmmm vvvv mvmv mvmv vvvm mmmv vvvm mmmv vmmv mvvm vmmv mvvm vmmv mvvm vmmv mvvm vvvv mmmm',
            ],
            [
                'level' => '18',
                'level_name' => 'z & x',
                'data_level' => 'zzzz xxxx zxzx zxzx xxxx zzzz xzxz xzxz zzzx xxxz zxxz xzzx zxxz xzzx zxxz xzzx zxxz xzzx zzxx xxzz zzzz xxxx',
            ],
            [
                'level' => '19',
                'level_name' => 'c & n',
                'data_level' => 'cccc nnnn cncn cncn nnnn cccc ncnc ncnc ccnn nncc ccnn nncc cnnc nccn cnnc nccn cnnc nccn cnnc nccn cccn nccc',
            ],
            [
                'level' => '20',
                'level_name' => 'x & b',
                'data_level' => 'xxxx bbbb xbxb xbxb bbbb xxxx bxbx bxbx xxbb bbxx xxbb bbxx xbbx bxxb xbbx bxxb xbbx bxxb xbbx bxxb xxxb bxxx',
            ],
            [
                'level' => '21',
                'level_name' => 'mix 16-20',
                'data_level' => 'zxcv vbnm mnbv vcxz cvxb cvzn zmxn zmxn zxxc vbbn vbbm zxcvbnm zxcvbnm mnbvcxz mnbvcxz xcvbn nbvcx',
            ],
            [
                'level' => '22',
                'level_name' => 'mix test 03',
                'data_level' => 'zone motion bedroom native vision measure background natural value x-ray meaning november zebra manufactering',
            ],
            // แถว A-:
            [
                'level' => '23',
                'level_name' => 'F & J',
                'data_level' => 'FJFJ FJFJ FJFJ FJFJ FFFF JJJJ FFFF JJJJ FFJJ JJFF FFJJ JJFF FFFJ JJJF FFFJ JJJF FJJF JFFJ FJJF JFFJ',
            ],
            [
                'level' => '24',
                'level_name' => 'D & K',
                'data_level' => 'DDDD KKKK DDDD KKKK DKDK DKDK DDKK KKDD DKDK DKDK DDKK KKDD DDDK KKKD DDDK KKKD DKKD KDDK DKKD KDDK',
            ],
            [
                'level' => '25',
                'level_name' => 'S & L',
                'data_level' => 'SSSS LLLL SSSS LLLL SLSL SLSL SSLL LLSS SLSL SLSL SSLL LLSS SSSL LLLS SSSL LLLS SLLS LSSL SLLS LSSL',
            ],
            [
                'level' => '26',
                'level_name' => 'A & :',
                'data_level' => 'AAAA :::: AAAA :::: A:A: A:A: AA:: ::AA A:A: A:A: AA:: ::AA AAA: :::A AAA: :::A A::A :AA: A::A :AA:',
            ],
            [
                'level' => '27',
                'level_name' => 'G & H',
                'data_level' => 'GGGG HHHH GGGG HHHH GHGH GHGH GHGH GHGH GGHH GGHH HHGG HHGG GGGH HHHG GGGH HHHG GHHG HGGH GHHG HGGH',
            ],
            [
                'level' => '28',
                'level_name' => 'mix 23-27',
                'data_level' => 'ASDFG HJKL: ASDFG HJKL: :LKJH GFDSA :LKJH GFDSA AASS DDFF JJKK LL:: AASS DDFF JJKK LL:: FGHJ JHGF FGHJ JHGF ASDKL: :LKDSA ASDKL: :LKDSA',
            ],
            [
                'level' => '29',
                'level_name' => 'mix test 04',
                'data_level' => 'ACADEMIC SAVING GENERAL DATABASE FAILURE GAME SCIENCE JUSTIFY KNOWLEDGE LABOUR SUPERCOMPUTER ACCURATE HAVING GROUP LICENCE',
            ],
            // แถว Q-}
            [
                'level' => '30',
                'level_name' => 'Y & U',
                'data_level' => 'YYYY UUUU YYYY UUUU YUYU YUYU YYUU UUYY YUYU YUYU YYUU UUYY YYYU UUUY YYYU UUUY YUUY UYYU YUUY UYYU YUUY UYYU YUUY UYYU',
            ],
            [
                'level' => '31',
                'level_name' => 'T & I',
                'data_level' => 'TTTT IIII TTTT IIII TITI TITI TTII IITT TITI TITI TTII IITT TTTI IIIT TTTI IIIT TIIT ITTI TIIT ITTI TIIT ITTI TIIT ITTI',
            ],
            [
                'level' => '32',
                'level_name' => 'R & O',
                'data_level' => 'RRRR OOOO RRRR OOOO RORO RORO RROO RROO RORO RORO OORR OORR RRRO OOOR RRRO OOOR ROOR ORRO ROOR ORRO ROOR ORRO ROOR ORRO',
            ],
            [
                'level' => '33',
                'level_name' => 'E & P',
                'data_level' => 'EEEE PPPP EEEE PPPP EPEP EPEP EEPP EEPP EPEP EPEP PPEE PPEE EEEP PPPE EEEP PPPE EPPE PEEP EPPE PEEP EPPE PEEP EPPE PEEP',
            ],
            [
                'level' => '34',
                'level_name' => 'W & {',
                'data_level' => 'WWWW {{{{ WWWW {{{{ W{W{ W{W{ WWW{ WWW{ W{W{ W{W{ {{{W {{{W WW{{ {{WW WW{{ {{WW W{{W {WW{ W{{W {WW{ W{{W {WW{ W{{W {WW{',
            ],
            [
                'level' => '35',
                'level_name' => 'Q & }',
                'data_level' => 'QQQQ }}}} QQQQ }}}} Q}Q} Q}Q} QQQ} QQQ} Q}Q} Q}Q} }}}Q }}}Q QQ}} }}QQ QQ}} }}QQ Q}}Q }QQ} Q}}Q }QQ} Q}}Q }QQ} Q}}Q }QQ}',
            ],
            [
                'level' => '36',
                'level_name' => 'mix 30-35',
                'data_level' => 'QWERTY UIOP{} QWUI QWUI EROP EROP {ERTY} {ERTY} {UIOP} {UIOP} QQWW EERR TTYY UUII OOPP {{}} }}{{ Q{RU}P W{EI}O',
            ],
            [
                'level' => '37',
                'level_name' => 'mix test 05',
                'data_level' => 'QUANTITY WALLET PARTNERSHIP EDUCATION TARGET YESTERDAY UNIQUE IMPORTANT OUTLINE PAGINATION UNIVERSITY PACKAGE',
            ],
            // แถว Z-M
            [
                'level' => '38',
                'level_name' => 'B & N',
                'data_level' => 'BBBB NNNN BNBN BNBN NNNN BBBB NBNB NBNB BBBN BBBN NBBB NBBB NBBN BNNB NBBN BNNB NBBN BNNB NBBN BNNB BBBB NNNN',
            ],
            [
                'level' => '39',
                'level_name' => 'V & M',
                'data_level' => 'VVVV MMMM VMVM VMVM MMMM VVVV MVMV MVMV VVVM MMMV VVVM MMMV VMMV MVVM VMMV MVVM VMMV MVVM VMMV MVVM VVVV MMMM',
            ],
            [
                'level' => '40',
                'level_name' => 'Z & X',
                'data_level' => 'ZZZZ XXXX ZXZX ZXZX XXXX ZZZZ XZXZ XZXZ ZZZX XXXZ ZXXZ XZZX ZXXZ XZZX ZXXZ XZZX ZXXZ XZZX ZZXX XXZZ ZZZZ XXXX',
            ],
            [
                'level' => '41',
                'level_name' => 'C & N',
                'data_level' => 'CCCC NNNN CNCN CNCN NNNN CCCC NCNC NCNC CCNN NNCC CCNN NNCC CNNC NCCN CNNC NCCN CNNC NCCN CNNC NCCN CCCN NCCC',
            ],
            [
                'level' => '42',
                'level_name' => 'X & B',
                'data_level' => 'XXXX BBBB XBXB XBXB BBBB XXXX BXBX BXBX XXBB BBXX XXBB BBXX XBBX BXXB XBBX BXXB XBBX BXXB XBBX BXXB XXXB BXXX',
            ],
            [
                'level' => '43',
                'level_name' => 'mix 38-42',
                'data_level' => 'ZXCV VBMN MNBV VCXZ CVXB CVZN ZMXN ZMXN ZXXC VBBN VBBM ZXXC ZXCVBMN ZXCVBMN MNBVCXZ MNBVCXZ XCVBN NBVCX XCVBN NBVCX',
            ],
            [
                'level' => '44',
                'level_name' => 'mix test 06',
                'data_level' => 'ZOOM CALCULATE BALANCE CALLBACK NOISE BRIGHT MASTER NUMBER XEROX CAPTURE BADLY VIRUS NORMALLY',
            ],
            // สัญลักษณ์
            [
                'level' => '45',
                'level_name' => 'symbol 01',
                'data_level' => '!!!! @@@@ !!@@ @@!! !!!! @@@@ !!@@ @@!! !!!@ @@@! !!!@ @@@! !@@! @!!@ !@@! @!!@ !@@! @!!@ !@@! @!!@ !@!@ !@!@ @!@! @!@!',
            ],
            [
                'level' => '46',
                'level_name' => 'symbol 02',
                'data_level' => '#### $$$$ ##$$ $$## #### $$$$ ##$$ $$## ###$ $$$# ###$ $$$# #$$# $##$ #$$# $##$ #$$# $##$ #$$# $##$ #$#$ #$#$ $#$# $#$#',
            ],
            [
                'level' => '47',
                'level_name' => 'symbol 03',
                'data_level' => '%%%% ^^^^ %%^^ ^^%% %%%% ^^^^ ^^%% %%^^ %%%^ ^^^% %%%^ ^^^% %^^% ^%%^ %^^% ^%%^ %^^% ^%%^ %^^% ^%%^ %^%^ %^%^ ^%^% ^%^%',
            ],
            [
                'level' => '48',
                'level_name' => 'symbol 04',
                'data_level' => '&&&& **** &&** **&& &&&& **** **&& &&** &&&* ***& &&&* ***& &**& *&&* &**& *&&* &**& *&&* &**& *&&* &*&* &*&* *&*& *&*&',
            ],
            [
                'level' => '49',
                'level_name' => 'symbol 05',
                'data_level' => '(((( )))) (()) ))(( (((( )))) (()) ))(( ((() )))( ())( )(() ())( )(() ())( )(() ())( )(() ()() ()()',
            ],
            [
                'level' => '50',
                'level_name' => 'symbol 06',
                'data_level' => '---- ____ --__ __-- ---- ____ __-- --__ ---_ ___- -__- _--_ -__- _--_ -__- _--_ -__- _--_ -_-_ -_-_ _-_- -_-_',
            ],
            [
                'level' => '51',
                'level_name' => 'symbol 07',
                'data_level' => '---- ____ --__ __-- ---- ____ __-- --__ ---_ ___- -__- _--_ -__- _--_ -__- _--_ -__- _--_ -_-_ -_-_ _-_- -_-_',
            ],
            [
                'level' => '52',
                'level_name' => 'symbol 08',
                'data_level' => '==== ++++ ==++ ++== ==== ++++ ==++ ++== ===+ +++= ===+ +++= =++= +==+ =++= +==+ =++= +==+ =++= +==+ =+=+ =+=+ +=+= +=+=',
            ],
            [
                'level' => '53',
                'level_name' => 'symbol 09',
                'data_level' => '<<<< >>>> <><> ><>< <<<< >>>> <><> ><>< <<<> >>>< <<<> >>>< <>>< ><<> <>>< ><<> <>>< ><<> <>>< ><<> <><> <><> ><>< ><><',
            ],
            [
                'level' => '54',
                'level_name' => 'symbol 10',
                'data_level' => '//// ???? /?/? ?/?/ //// ???? ?/?/ /?/? ///? ???/ ///? ???/ /??/ ?//? /??/ ?//? /??/ ?//? /??/ ?//? /?/? //?? //?? ??// ??//',
            ],
            [
                'level' => '55',
                'level_name' => 'mix symbol',
                'data_level' => '!@#$ %^&* ()_+ <>/? (-=) !@#$ %^&* ()_+ <>/? (-=) !@#$ %^&* ()_+ <>/? (-=) !@#$ %^&* ()_+ <>/? (-=) +_)( *&^% $#@! +_)( *&^% $#@!',
            ],
            [
                'level' => '56',
                'level_name' => 'sentence 01',
                'data_level' => 'All she had to do was choose the color she wanted to wear-- black for the past several days in silent objection to her presence aboard the ship-- and the ship computer wove it for her.',
            ],
            [
                'level' => '57',
                'level_name' => 'sentence 02',
                'data_level' => 'He went to the university of Leipzig as a student of philosophy and natural sciences, but entered officially as a student of medicine.',
            ],
            [
                'level' => '58',
                'level_name' => 'sentence 03',
                'data_level' => 'The system contains a computer chip, so adjustments to the dose, rate, and timing of the medication can be made by the physician using an external programmer.',
            ],
            [
                'level' => '59',
                'level_name' => 'sentence 04',
                'data_level' => 'The khiao were invested by a gold dish, betel-box, spittoon and teapot, which were sent from Bangkok and returned at their death or deposition.',
            ],
            [
                'level' => '60',
                'level_name' => 'sentence 05',
                'data_level' => 'Sicily is the chief centre of cultivationthe area occupied by lemon and orange orchards in the province of Palermo alone having increased from ff525 acres in 1854 to 54,340 in 1874.',
            ],

        ];

        foreach($exercise as $key => $value) {
            Exercise::create($value);
        }
    }
}
