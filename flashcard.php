<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: /login.php');
  exit;
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Emotion Flashcards</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/theme.css">
</head>
<body>
  <?php include __DIR__ . '/includes/sidebar.php'; ?>
  <?php include __DIR__ . '/includes/header.php'; ?>

  <main class="app-main">
    <div class="page-head">
      <div class="page-title" style="font-size:30px;font-weight:700;margin-bottom:6px;">Emotion Flashcards</div>
      <div class="page-sub" style="color:var(--muted);font-size:15px;">Learn about different emotions and how to manage them</div>
    </div>

    <div class="cards-grid" id="cards"></div>
  </main>

  <div class="overlay" id="overlay"></div>
  <div class="modal" id="modal">
    <div class="dialog card">
      <button class="modal-close" id="closeModal">×</button>
      <div class="fc-icon" id="modalIcon" style="margin-top:8px;"></div>
      <div class="modal-title" id="modalTitle"></div>
      <div class="modal-sub" id="modalSub"></div>

      <div class="section-title">About This Emotion</div>
      <div class="modal-sub" id="modalAbout" style="text-align:left;margin-bottom:12px;"></div>

      <div class="section-title">Common Triggers</div>
      <ul class="list" id="modalTriggers"></ul>

      <div class="section-title">How to Manage</div>
      <div id="modalManage"></div>
    </div>
  </div>

  <script>
    const overlay = document.getElementById('overlay');
    const modal = document.getElementById('modal');
    const closeModalBtn = document.getElementById('closeModal');
    const cardsContainer = document.getElementById('cards');
    const data = [
      { title:'Happy', icon:'😊', sub:'Feeling joyful and content', about:'Happiness is a positive emotional state characterized by feelings of joy, satisfaction, contentment, and fulfillment.', triggers:['Social connection','Achievement','Pleasant events'], manage:['Acknowledge the feeling','Share gratitude','Keep a note of what worked']},
      { title:'Sad', icon:'😢', sub:'Feeling down or unhappy', about:'Sadness is a natural response to loss, disappointment, or hardship. It can help you process and reflect.', triggers:['Loss or grief','Disappointment','Loneliness'], manage:['Allow yourself to feel','Talk to someone','Do a small self-care action']},
      { title:'Stressed', icon:'😰', sub:'Feeling overwhelmed or pressured', about:'Stress is the body’s response to pressure. Short-term stress can motivate, but prolonged stress can be draining.', triggers:['Workload','Deadlines','Conflict'], manage:['Try box breathing','Break tasks into small parts','Take short breaks']},
      { title:'Calm', icon:'😌', sub:'Feeling peaceful and relaxed', about:'Calm is a state of mental and emotional ease. It supports clear thinking and recovery.', triggers:['Quiet environments','Mindfulness practice','Rest'], manage:['Practice gentle breathing','Maintain routine','Limit stimulants']},
      { title:'Anxious', icon:'😟', sub:'Feeling worried or nervous', about:'Anxiety is a feeling of fear or unease. It can appear when anticipating uncertain outcomes.', triggers:['Upcoming events','Uncertainty','High pressure'], manage:['Grounding techniques','Limit caffeine','Seek support']},
      { title:'Angry', icon:'😠', sub:'Feeling frustrated or mad', about:'Anger signals that boundaries or needs may be violated. It can motivate change when managed safely.', triggers:['Feeling disrespected','Frustration','Injustice'], manage:['Pause and breathe','Set boundaries','Channel energy into action']},
      { title:'Excited', icon:'🤩', sub:'Feeling energized and enthusiastic', about:'Excitement is high energy toward something positive. It fuels motivation and creativity.', triggers:['Anticipation','Novelty','Success'], manage:['Plan constructive outlets','Share enthusiasm','Use energy productively']},
      { title:'Tired', icon:'😴', sub:'Feeling exhausted or drained', about:'Tiredness is a cue that the body or mind needs rest and replenishment.', triggers:['Poor sleep','Overworking','Long screen time'], manage:['Prioritize sleep','Short naps','Reduce screen exposure']},
      { title:'Grateful', icon:'🙏', sub:'Feeling thankful and appreciative', about:'Gratitude is recognizing the good in your life, which can boost mood and resilience.', triggers:['Acts of kindness','Reflection','Positive events'], manage:['Write a gratitude list','Express thanks','Savor the moment']},
      { title:'Confused', icon:'🤔', sub:'Feeling uncertain or unclear', about:'Confusion happens when information or feelings are unclear. It invites curiosity and clarification.', triggers:['Mixed messages','Lack of info','Complex situations'], manage:['Ask clarifying questions','Break problems down','Seek examples']},
      { title:'Proud', icon:'😎', sub:'Feeling accomplished and confident', about:'Pride is satisfaction from achievements or values lived out. It can reinforce positive behaviors.', triggers:['Achievement','Recognition','Growth'], manage:['Celebrate wins','Share with others','Reflect on steps taken']},
      { title:'Lonely', icon:'😔', sub:'Feeling isolated or disconnected', about:'Loneliness is the gap between desired and actual connection. It can motivate reaching out.', triggers:['Lack of social contact','Moving places','Transitions'], manage:['Reach out','Join groups','Schedule a call']},
    ];

    function openModal(card){
      overlay.classList.add('show');
      modal.classList.add('show');
      document.getElementById('modalIcon').textContent = card.icon;
      document.getElementById('modalTitle').textContent = card.title;
      document.getElementById('modalSub').textContent = card.sub;
      document.getElementById('modalAbout').textContent = card.about;
      const trigEl = document.getElementById('modalTriggers');
      trigEl.innerHTML = card.triggers.map(t=>`<li>${t}</li>`).join('');
      const manageEl = document.getElementById('modalManage');
      manageEl.innerHTML = card.manage.map((m,i)=>`<div class="step"><div class="num">${i+1}</div><div>${m}</div></div>`).join('');
    }
    function closeModal(){
      overlay.classList.remove('show');
      modal.classList.remove('show');
    }
    overlay.addEventListener('click',closeModal);
    closeModalBtn.addEventListener('click',closeModal);

    // render cards
    data.forEach(card=>{
      const el = document.createElement('div');
      el.className='flash-card card';
      el.innerHTML = `
        <div class="fc-icon">${card.icon}</div>
        <div class="fc-title">${card.title}</div>
        <div class="fc-sub">${card.sub}</div>
      `;
      el.addEventListener('click',()=>openModal(card));
      cardsContainer.appendChild(el);
    });
  </script>

  <script>
    async function updateAuthSection() {
      try {
        const response = await fetch('./api/auth_status.php');
        const data = await response.json();
        const userInfo = document.getElementById('userInfo');
        const authPrompt = document.getElementById('authPrompt');
        
        if (data.logged_in && data.user) {
          document.getElementById('username').textContent = data.user.username;
          userInfo.style.display = 'flex';
          authPrompt.style.display = 'none';
        } else {
          userInfo.style.display = 'none';
          authPrompt.style.display = 'block';
        }
      } catch (error) {
        console.error('Error checking auth status:', error);
      }
    }

    function logout() {
      fetch('./api/logout.php', { method: 'POST' })
        .then(() => {
          window.location.href = './login.php';
        })
        .catch(error => console.error('Error logging out:', error));
    }

    updateAuthSection();
  </script>
</body>
</html>
