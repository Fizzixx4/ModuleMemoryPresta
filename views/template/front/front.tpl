{extends file = 'page.tpl'}

{block name = 'page_content'}
    <section id="windowGame">
        <h1></h1>
        <h2 class='h2Memo'>Memory Game</h2>
        <div id="game">
            <div class="leftSection">
                <div class="rowMemo">
                    <div class="cardMemoContainer">
                        <div class="cardMemo">
                            <div class="cardMemoFront">
                            </div>
                            <div class="cardMemoBack">
                                <img class="imgMemo" src={$arrayPath[0]}>
                            </div>
                        </div>
                    </div>
                    <div class="cardMemoContainer">
                        <div class="cardMemo">
                            <div class="cardMemoFront">
                            </div>
                            <div class="cardMemoBack">
                                <img class="imgMemo" src={$arrayPath[0]}>
                            </div>
                        </div>
                    </div>
                    <div class="cardMemoContainer">
                        <div class="cardMemo">
                            <div class="cardMemoFront">
                            </div>
                            <div class="cardMemoBack">
                                <img class="imgMemo" src={$arrayPath[4]}>
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
                                <img class="imgMemo" src={$arrayPath[4]}>
                            </div>
                        </div>
                    </div>
                    <div class="cardMemoContainer">
                        <div class="cardMemo">
                            <div class="cardMemoFront">
                            </div>
                            <div class="cardMemoBack">
                                <img class="imgMemo" src={$arrayPath[3]}>
                            </div>
                        </div>
                    </div>
                    <div class="cardMemoContainer">
                        <div class="cardMemo">
                            <div class="cardMemoFront">
                            </div>
                            <div class="cardMemoBack">
                                <img class="imgMemo" src={$arrayPath[3]}>
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
                                <img class="imgMemo" src={$arrayPath[1]}>
                            </div>
                        </div>
                    </div>
                    <div class="cardMemoContainer">
                        <div class="cardMemo">
                            <div class="cardMemoFront">
                            </div>
                            <div class="cardMemoBack">
                                <img class="imgMemo" src={$arrayPath[1]}>
                            </div>
                        </div>
                    </div>
                    <div class="cardMemoContainer">
                        <div class="cardMemo">
                            <div class="cardMemoFront">
                            </div>
                            <div class="cardMemoBack">
                                <img class="imgMemo" src={$arrayPath[2]}>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rightSection">
                <h3 class="displayVictoryLoose"></h3>
            </div>
        </div>
    </section>
{/block}