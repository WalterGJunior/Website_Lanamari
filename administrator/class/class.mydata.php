<?
################################################################################
## CLASS CRIADA POR: Whilton Reis                                             ##
## DATA............: 14/05/2015                                               ##
## E-MAIL..........: whiltonreis@gmail.com                                    ##
## MSN.............: whiltonreis@gmail.com                                    ##
## SKYPE...........: polaristecnologia                                        ##
## VERS�O..........: 1.0                                                      ##
################################################################################

class myData
      {
      //Fun��o para mostrar a data por extenso, inclusive com sauda��o
      function myData()
            {
            $SAUDACAO         = array('','Bom dia','Boa tarde','Boa noite');
            $DIA_EXTENSSO     = array('','Segunda-feira','Ter�a-feira','Quarta-feira','Quinta-feira','Sexta-feira','S�bado','Domingo');
            $MES_EXTENSSO     = array('','janeiro','fevereiro','mar�o','abril','maio','junho','julho','agosto','setembro','outubro','novembro','dezembro');

            if (date('H') <= '12') { $saudacao = $SAUDACAO[1]; } else if (date('H') <= '18') { $saudacao = $SAUDACAO[2]; } else if (date('H') <= '24') { $saudacao = $SAUDACAO[3]; }

            return $saudacao . ", hoje � " . $DIA_EXTENSSO[date('w')] . ", " . date('d') . " de " . $MES_EXTENSSO[date('n')] . " de " . date('Y');
            }
      }
?>

