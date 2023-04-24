<script>
    function save98() {
    // Находим кнопку "Ок"
    var saveTechBtn = document.getElementById('saveTechBtn');

    // Находим текстовое поле для вывода выбранных технологий
    var selectedTech = document.querySelector('.modal-footer a');

      // Находим все чекбоксы
      var checkboxes = document.querySelectorAll('.form-check-input');

      // Создаем пустой массив для хранения выбранных технологий
      var selectedTechnologies = [];

      // Проходимся по всем чекбоксам
      checkboxes.forEach(function(checkbox) {
        // Проверяем, отмечен ли текущий чекбокс
        if (checkbox.checked) {
          // Если да, то добавляем его значение в массив выбранных технологий
          selectedTechnologies.push(checkbox.value);
        }
      });
      // Если есть выбранные технологии, то добавляем их в текстовое поле
      if (selectedTechnologies.length > 0) {
        document.getElementById('texhnonlogi').innerHTML = selectedTechnologies.join(', ');
      } else {
        document.getElementById('texhnonlogi').innerHTML = '';
      }
    };

 </script> 

<div class="technologies">
              <button type="button" class="btn btn-publish" id="chooseTechBtn" data-toggle="modal" data-target="#techModal">
                Выбрать
              </button>
              <!-- Модальное окно -->
              <div class="modal fade" id="techModal" tabindex="-1" role="dialog" aria-labelledby="techModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="techModalLabel">Выберите технологии</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- Тут размещаем список технологий из базы данных -->
                      <div class="form-check">
                        <?php
                          $sql = "SELECT * FROM technology";
                          $result = mysqli_query($conn, $sql);
                          while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div>
                        <br>
                          <input class="form-check-input" type="checkbox" value="<?= $row['name_technology'] ?>" id="<?= $row['id'] ?>">
                          <label class="form-check-label" for="<?= $row['id'] ?>">
                              <?= $row['name_technology'] ?>
                          </label>
                        </div>
                        <?php } ?>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                      <button type="button" class="btn btn-primary" data-dismiss="modal" id="saveTechBtn" onclick="save98()">Ок</button>
                    
                    </div>
                  </div>
                </div>
              </div>
              </div>

