{extends file = 'page.tpl'}

{block name = 'page_content'}
    <section id="windowGame">
        <h2 class='h2Memo'>Memory Game</h2>
        <div id="game">
            <div class="leftSection">
                <div class="rowMemo">
                    <div class="cardMemoContainer">
                        <div class="cardMemo">
                            <div class="cardMemoFront">
                            </div>
                            <div class="cardMemoBack">
                                <img class="imgMemo" src={$randomArray[0]}>
                            </div>
                        </div>
                    </div>
                    <div class="cardMemoContainer">
                        <div class="cardMemo">
                            <div class="cardMemoFront">
                            </div>
                            <div class="cardMemoBack">
                                <img class="imgMemo" src={$randomArray[1]}>
                            </div>
                        </div>
                    </div>
                    <div class="cardMemoContainer">
                        <div class="cardMemo">
                            <div class="cardMemoFront">
                            </div>
                            <div class="cardMemoBack">
                                <img class="imgMemo" src={$randomArray[2]}>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rowMemo">
                    <div class="cardMemoContainer">
                        <div class="cardMemo">
                            <div class="cardMemoFront">
                            </div>
                            <div class="cardMemoBack">
                                <img class="imgMemo" src={$randomArray[3]}>
                            </div>
                        </div>
                    </div>
                    <div class="cardMemoContainer">
                        <div class="cardMemo">
                            <div class="cardMemoFront">
                            </div>
                            <div class="cardMemoBack">
                                <img class="imgMemo" src={$randomArray[4]}>
                            </div>
                        </div>
                    </div>
                    <div class="cardMemoContainer">
                        <div class="cardMemo">
                            <div class="cardMemoFront">
                            </div>
                            <div class="cardMemoBack">
                                <img class="imgMemo" src={$randomArray[5]}>
                            </div>
                        </div>
                    </div>
                        </div>
                <div class="rowMemo">
                    <div class="cardMemoContainer">
                        <div class="cardMemo">
                            <div class="cardMemoFront">
                            </div>
                            <div class="cardMemoBack">
                                <img class="imgMemo" src={$randomArray[6]}>
                            </div>
                        </div>
                    </div>
                    <div class="cardMemoContainer">
                        <div class="cardMemo">
                            <div class="cardMemoFront">
                            </div>
                            <div class="cardMemoBack">
                                <img class="imgMemo" src={$randomArray[7]}>
                            </div>
                        </div>
                    </div>
                    <div class="cardMemoContainer">
                        <div class="cardMemo">
                            <div class="cardMemoFront">
                            </div>
                            <div class="cardMemoBack">
                                <img class="imgMemo" src={$randomArray[8]}>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rightSection">
            {if $smarty.get.victory == 0}
                 <div class="displayVictoryLoose">
                </div>
            {/if}
            {if $smarty.get.victory == 1}
                <h4 class='CodeMemo'>Notez ce code pour l'utiliser lors de votre prochain achat:<br><span>{$code}</span></h4>
            {/if}
            </div>
        </div>
    </section>
{/block}