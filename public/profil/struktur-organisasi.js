document.addEventListener("DOMContentLoaded", () => {
  const branchCard = document.querySelector(".org-card-branch");

  if (branchCard) {
    const branchBoxes = branchCard.querySelectorAll(".branch-box");
    const branchChildren = branchCard.querySelectorAll(".branch-child");

    branchBoxes.forEach((box) => {
      box.setAttribute("role", "group");
    });

    branchChildren.forEach((child) => {
      child.setAttribute("role", "group");
    });
  }

  initPhotoRotators();
  initCardEffects();
  initRevealAnimations();
});

function initPhotoRotators() {
  const rotators = Array.from(document.querySelectorAll(".photo-rotator"));
  if (!rotators.length) return;

  const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  rotators.forEach((rotator, index) => {
    const layers = Array.from(rotator.querySelectorAll(".photo-layer"));
    const firstImage = layers[0];
    if (!firstImage) return;

    const altSrc = firstImage.dataset.altSrc;
    const hasAltSrc = altSrc && altSrc !== firstImage.getAttribute("src");

    if (hasAltSrc && layers.length < 2) {
      const secondImage = document.createElement("img");
      secondImage.className = "photo-layer";
      secondImage.alt = firstImage.alt;
      secondImage.src = altSrc;
      rotator.appendChild(secondImage);
    }

    const finalLayers = Array.from(rotator.querySelectorAll(".photo-layer"));
    const textContainer = findTextContainer(rotator);

    let currentIndex = 0;
    let timer = null;
    let isAnimating = false;

    function setTextTransition(active) {
      if (!textContainer) return;
      textContainer.classList.remove("text-swapping", "text-restored");
      textContainer.classList.add(active ? "text-restored" : "text-swapping");
    }

    if (finalLayers.length < 2) {
      rotator.classList.add("is-single-photo");

      if (!reduceMotion) {
        rotator.classList.add("single-motion");
      }

      rotator.addEventListener("mouseenter", () => {
        rotator.classList.add("is-hovered");
      });

      rotator.addEventListener("mouseleave", () => {
        rotator.classList.remove("is-hovered");
      });

      rotator.addEventListener("focusin", () => {
        rotator.classList.add("is-hovered");
      });

      rotator.addEventListener("focusout", () => {
        rotator.classList.remove("is-hovered");
      });

      return;
    }

    function goToSlide(nextIndex) {
      if (isAnimating || nextIndex === currentIndex) return;

      isAnimating = true;
      setTextTransition(false);

      finalLayers[currentIndex].classList.remove("is-active");
      finalLayers[nextIndex].classList.add("is-active");

      window.setTimeout(() => {
        currentIndex = nextIndex;
        setTextTransition(true);
        isAnimating = false;
      }, 420);
    }

    function nextSlide() {
      const nextIndex = (currentIndex + 1) % finalLayers.length;
      goToSlide(nextIndex);
    }

    function stop() {
      if (timer) {
        window.clearInterval(timer);
        timer = null;
      }
      rotator.classList.add("is-hovered");
    }

    function start() {
      rotator.classList.remove("is-hovered");
      if (reduceMotion) return;
      stopInternal();
      timer = window.setInterval(nextSlide, 3200 + (index % 3) * 400);
    }

    function stopInternal() {
      if (timer) {
        window.clearInterval(timer);
        timer = null;
      }
    }

    rotator.addEventListener("mouseenter", stop);
    rotator.addEventListener("mouseleave", start);
    rotator.addEventListener("focusin", stop);
    rotator.addEventListener("focusout", start);

    document.addEventListener("visibilitychange", () => {
      if (document.hidden) {
        stopInternal();
      } else {
        start();
      }
    });

    setTextTransition(true);
    start();
  });
}

function initCardEffects() {
  const cards = document.querySelectorAll(".org-card, .leader-card");

  cards.forEach((card) => {
    card.addEventListener("mousemove", (e) => {
      const rect = card.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;

      const rotateY = ((x / rect.width) - 0.5) * 8;
      const rotateX = ((y / rect.height) - 0.5) * -8;

      card.style.setProperty("--pointer-x", `${x}px`);
      card.style.setProperty("--pointer-y", `${y}px`);
      card.style.setProperty("--rotate-x", `${rotateX}deg`);
      card.style.setProperty("--rotate-y", `${rotateY}deg`);
    });

    card.addEventListener("mouseleave", () => {
      card.style.setProperty("--rotate-x", "0deg");
      card.style.setProperty("--rotate-y", "0deg");
    });
  });
}

function initRevealAnimations() {
  const revealItems = document.querySelectorAll(
    ".section-head, .leader-card, .org-card, .org-top-line, .org-main-line"
  );

  if (!revealItems.length) return;

  const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  if (reduceMotion) {
    revealItems.forEach((item) => item.classList.add("is-visible"));
    return;
  }

  const observer = new IntersectionObserver(
    (entries, obs) => {
      entries.forEach((entry, idx) => {
        if (!entry.isIntersecting) return;

        const target = entry.target;
        const delay = target.dataset.revealDelay || "0";
        target.style.transitionDelay = `${delay}ms`;
        target.classList.add("is-visible");
        obs.unobserve(target);
      });
    },
    {
      threshold: 0.14,
      rootMargin: "0px 0px -40px 0px",
    }
  );

  revealItems.forEach((item, index) => {
    if (item.classList.contains("org-card")) {
      item.dataset.revealDelay = `${80 + (index % 4) * 70}`;
    } else if (item.classList.contains("leader-card")) {
      item.dataset.revealDelay = "80";
    } else {
      item.dataset.revealDelay = "0";
    }

    observer.observe(item);
  });
}

function findTextContainer(rotator) {
  const leaderCard = rotator.closest(".leader-card");
  if (leaderCard) {
    return leaderCard.querySelector(".leader-info");
  }

  const orgCard = rotator.closest(".org-card");
  if (orgCard) {
    return orgCard;
  }

  const branchBox = rotator.closest(".branch-box");
  if (branchBox) {
    return branchBox;
  }

  const branchChild = rotator.closest(".branch-child");
  if (branchChild) {
    return branchChild;
  }

  return null;
}