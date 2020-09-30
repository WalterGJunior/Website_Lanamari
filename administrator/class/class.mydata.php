<?
################################################################################
## CLASS CRIADA POR: Whilton Reis                                             ##
## DATA............: 14/05/2015                                               ##
## E-MAIL..........: whiltonreis@gmail.com                                    ##
## MSN.............: whiltonreis@gmail.com                                    ##
## SKYPE...........: polaristecnologia                                        ##
## VERSÃO..........: 1.0                                                      ##
################################################################################

class myData
      {
      //Função para mostrar a data por extenso, inclusive com saudação
      function myData()
            {
            $SAUDACAO         = array('','Bom dia','Boa tarde','Boa noite');
            $DIA_EXTENSSO     = array('','Segunda-feira','Terça-feira','Quarta-feira','Quinta-feira','Sexta-feira','Sábado','Domingo');
            $MES_EXTENSSO     = array('','janeiro','fevereiro','março','abril','maio','junho','julho','agosto','setembro','outubro','novembro','dezembro');

            if (date('H') <= '12') { $saudacao = $SAUDACAO[1]; } else if (date('H') <= '18') { $saudacao = $SAUDACAO[2]; } else if (date('H') <= '24') { $saudacao = $SAUDACAO[3]; }

            return $saudacao . ", hoje é " . $DIA_EXTENSSO[date('w')] . ", " . date('d') . " de " . $MES_EXTENSSO[date('n')] . " de " . date('Y');
            }
      }
?>

